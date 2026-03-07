(function() {
/**
 * ExpandBox 1.2
 * Expanding Select Box
 * @author Daniel Fekete
 */

	function addEvent(obj, evType, fn){
		if (obj.addEventListener){
			obj.addEventListener(evType, fn, false);
			return true;
		} else if (obj.attachEvent){
			var r = obj.attachEvent("on"+evType, fn);
			return r;
		} else {
			return false;
		}
	}

	function delegate(fn, object) {
		fn.call(object);
	}

	function ExpandBox() {
		this.elements = new Array(),
		this.max_depth = 0,
		this.last_selected = -1,
		this.hidden_input_name = "expandbox-hidden-input",
		this.selected_category_name = "expandbox-selected-name",
		this.selected_category_text = "Kiválasztott kategória = ";
	}

	ExpandBox.fn = ExpandBox.prototype;
	ExpandBox.fn.onSelect = function(select_id, text) {};

	ExpandBox.fn.addOption = function(ctrl, name, value) {
		if (!ctrl) return;
		var new_opt = document.createElement("option");
		/*if (selected_place != "" && selected_place == value)
			new_opt.selected = true;*/
		new_opt.value = value;
		new_opt.innerHTML = name;

		ctrl.appendChild(new_opt);
	};

	ExpandBox.fn.addElement = function(id, parentid, value) {
		var buffer_object = new Object();
		if (value == "") return;

		buffer_object.id = id;
		buffer_object.parentid = parentid;
		buffer_object.value = value;

		this.elements.push(buffer_object);
	};

	ExpandBox.fn.addElements = function(json) {
		this.elements = this.elements.concat(json);
		this.finishAdd();
	};

	ExpandBox.fn.finishAdd = function() {
		function BFS(obj, parentid, parentdepth, parentindex) {
			var buffer = new Array();
			for(var i in obj.elements) {
				if (obj.elements[i].parentid == parentid) {
					obj.elements[i].depth = parentdepth+1;
					obj.elements[i].index = i;
					buffer.push(obj.elements[i]);

					if (parentindex != undefined) {
						if(obj.elements[parentindex].value.indexOf(" >") == -1) obj.elements[parentindex].value += " >";
					}
				}
			}
			obj.max_depth = Math.max(obj.max_depth, parentdepth+1);
			for (var j in buffer) {
				BFS(obj, buffer[j].id, buffer[j].depth, buffer[j].index);
			}
		}

		BFS(this, 0, -1); // Kezdjük a root node-al
	};

	ExpandBox.fn.returnElement = function(id) {
		for (var i in this.elements) {
			if (this.elements[i].id == id) return i;
		}

		return -1;
	};


	ExpandBox.fn.removeChildNodes = function(ctrl) {
		if (!ctrl) return;
  		while (ctrl.childNodes[0])
    		ctrl.removeChild(ctrl.childNodes[0]);
	};

	ExpandBox.fn.selectId = function(select_id) {
		var pos = this.returnElement(select_id);
		if (pos == -1) return;
		for (var i in this.elements[pos].parent_tree) {
			//if (i == this.elements[pos].parent_tree.length-1) break;
			if(select_id != this.elements[pos].parent_tree[i])
				this.clickHandler(this.elements[pos].parent_tree[i]);

			if (arguments[1] == true)
				this.clickHandler(this.elements[pos].id);
		}
	};
	
	ExpandBox.fn.removeChildLists = function(depth) {
		for(var i=depth; i<=this.max_depth; i++) {
			var list_obj = document.getElementById("expandbox-list-" + i);
			this.removeChildNodes(list_obj);
		}
	};

	ExpandBox.fn.buildChilds = function(parentid) {
		var this_depth = 0;
		if (parentid > 0) {
			var parent_element_pos = this.returnElement(parentid);
			this_depth = this.elements[parent_element_pos].depth + 1;
		}
		var list_obj = document.getElementById("expandbox-list-" + this_depth);
		this.removeChildLists(this_depth);
		if (arguments[1] == true && parentid == 0) {
			// build '..' root link
			this.addOption(list_obj, '..', 0);
		}
		for (var i=0; i<this.elements.length; i++) {
			if (this.elements[i].parentid == parentid && !isNaN(this.elements[i].id)) {
				this.addOption(list_obj, this.elements[i].value, this.elements[i].id);
			}

		}
	};

	ExpandBox.fn.list_click = function(obj) {
		if (obj.selectedIndex == -1) return;
		var selected_id = obj.options[obj.selectedIndex].value;
		this.clickHandler(selected_id);
	};

	ExpandBox.fn.setListboxSelection = function(selectboxName, id) {
		var obj = document.getElementsByName(selectboxName)[0];

		for(var i=0; i<obj.options.length; i++) {
			if (obj.options[i].value == id) obj.selectedIndex = i;
			//console.log(i);
		}
	};

	ExpandBox.fn.setSelected = function(id, selectLastElem) {
		var pos = this.returnElement(id),
		i = pos,
		buffer = new Array();
		while (this.elements[i]) {
			var obj = {id: this.elements[i].id, depth: this.elements[i].depth};
			buffer.splice(0, 0, obj);
			i = this.returnElement(this.elements[i].parentid);
		}
		if (selectLastElem == false) buffer = buffer.slice(0, buffer.length-1);

		for(var j in buffer) {
			this.clickHandler(buffer[j].id);
			this.setListboxSelection("expandbox-list-" + buffer[j].depth, buffer[j].id);
		}
	};

	ExpandBox.fn.clickHandler = function(id) {
		var selected_id = id;

		if (!isNaN(selected_id)) {
			//alert(selected_id);
			this.last_selected = selected_id;
			var hidden_obj = document.getElementById(this.hidden_input_name);
			if (hidden_obj)
				hidden_obj.value = selected_id;

			var sel_obj = document.getElementById(this.selected_category_name);
			var text = this.elements[this.returnElement(selected_id)].value;
			if(sel_obj) {
				if (text.indexOf(">") > -1) text = text.substring(0, text.length-2);
				sel_obj.innerHTML = this.selected_category_text +  text;
			}

			this.onSelect(selected_id, text);
			document.location.hash = "category=" + selected_id;
		}
		if (selected_id == 0)
			this.buildChilds(selected_id, true);
		else
			this.buildChilds(selected_id);
	};

	ExpandBox.fn.renderListBox = function(depth) {
		var buffer_text = "";
		buffer_text += "<div class=\"expandbox_select_holder\">";
		buffer_text += "<select name=\"expandbox-list-" + depth + "\" id=\"expandbox-list-" + depth + "\" onclick=\"expandbox.list_click(this);\" size=\"5\">"

		buffer_text += "</select>";
		buffer_text += "</div>";

		//document.getElementById("expandbox-list-" + depth).onclick = this.expandlist_s

		return buffer_text;
	};

	ExpandBox.fn.categoryRefresh = function() {
		if (!document.getElementById(this.hidden_input_name)) return;

		var hash = /category=(.+?)$/g.exec(window.location);
		if (hash && hash.length > 0)
			this.setSelected(hash[1]);
	};


	ExpandBox.fn.render = function() {
		for(var i=0; i<this.max_depth; i++) {
			document.write(this.renderListBox(i));
		}
		if (arguments[0] == true)
			this.buildChilds(0, true);
		else
			this.buildChilds(0);
		var obj = this;
		addEvent(window, "load", function(event) {
			obj.categoryRefresh();
		});
	};

	ExpandBox.fn.renderHiddenInput = function(input_name) {
		var buffer_text = "";
		if (!arguments[1])
			buffer_text += "<input type=\"hidden\" name=\"" + input_name + "\" id=\"expandbox-hidden-input\" value=\"\" />";
		else {
			buffer_text += "<input type=\"hidden\" name=\"" + input_name + "\" id=\"" + arguments[1] + "\" value=\"\" />";
			this.hidden_input_name = arguments[1];
		}
		document.write(buffer_text);
		this.categoryRefresh();
	};
	

window.expandbox = new ExpandBox();
})();