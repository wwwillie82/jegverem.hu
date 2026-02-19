(function($) {


	var KEY = {
		BACKSPACE: 8,
		TAB: 9,
		ENTER: 13,
		ESCAPE: 27,
		SPACE: 32,
		PAGE_UP: 33,
		PAGE_DOWN: 34,
		END: 35,
		HOME: 36,
		LEFT: 37,
		UP: 38,
		RIGHT: 39,
		DOWN: 40,
		NUMPAD_ENTER: 108,
		COMMA: 188
	};

	var defaults = {
		separator: KEY.COMMA,
		uniqueOnly: false,
		tagHolder: "#tags",
		suggestList: [{id: "1", value: "Valami"}],
		suggestOpenTime: 3000,
		suggestOffsetTop: 10,
		suggestOffsetLeft: 10,
		suggestHeight: 300,
		suggestUrl: undefined,
		suggestMinChars: 3
	};

	var tags = []; // holder for tags
	var opts;
	var suggest_holder;
	var suggestTimeout = null;
	var isMouseOver = false;
	var elementCount = 0;

	function RenderTag(id, value) {
		var holder = $("<div />").addClass("tag").css({backgroundColor: "#ccc", border: "1px solid #555"}).html(value);
		var input = $("<input />").attr({"name": "tags[]", "type": "hidden"}).val(id);
		holder.append(input);
		$(opts.tagHolder).append(holder);
	}

	/**
	 * Adds a tag to the list, ID is retrieved automatically
	 * @param value
	 */
	function AddTag(value) {
		// get id from AJAX
		var id = 1; // only for test
		if(!opts.uniqueOnly || !HasTag(id)) {
			tags.push({id: id, value: value});
			RefreshTags();
		}
	}

	/**
	 * Check if we already have the tag ID in the list
	 * @param id tag ID to search for
	 */
	function HasTag(id) {
		for(var i in tags) {
			if(tags[i].id == id) return true;
		}
		return false;
	}


	/**
	 * Refreshes the tag list
	 */
	function RefreshTags() {
		$(opts.tagHolder).empty();
		for (var i in tags) {
			RenderTag(tags[i].id, tags[i].value);
		}
	}

	function RemoveTag() {

	}

	/** Auto suggest box */
	function AutoSuggest(e) {
		value  = GetCurrentToken(this);

		var newchar = String.fromCharCode(e.which);
		if ((!newchar.match(/\w+/) && (e.which != 8 && e.which != 46))
				|| (newchar.match(/\w+/) && value.length < opts.suggestMinChars)) return;
		
		if (opts.url != "") {
			$.getJSON(opts.url, {value:value}, function(data) {
				opts.suggestList = data;
			});
		}

		ShowSuggest(opts.suggestList, value, this, false);
	}


	function ShowSuggest(json, orig_value, obj, append) {
		if (append == undefined || !append)
			ClearSuggestions();
		if (suggestTimeout != null) clearTimeout(suggestTimeout);


		suggest_holder.show();
		suggest_holder.height(json.length*50+50);
		suggestTimeout = setTimeout(HideSuggest, opts.suggestOpenTime);

		for(var i in json) {
			var value = json[i].value.replace(new RegExp(orig_value, "i"), "<span class=\"suggest-highlight\" style=\"font-weight: bold;\">" + orig_value + "</span>");
			var html = "<li class=\"suggest-li\">" + value + "</li>";
			var li = $(html);
			$("ul", suggest_holder).append(li);
			elementCount += 1;
			li.data("id", json[i].id);
		}

		$("ul li", suggest_holder).bind("click", function(e) {
			SuggestionClick($.data(this, "id"), obj);
		});
	}

	function GetValue(id) {
		for(var i in opts.suggestList) {
			if(opts.suggestList[i].id==id) return opts.suggestList[i].value;
		}
		return false;
	}
	

	function ClearSuggestions() {
		$("ul", suggest_holder).empty();
	}
	

	function HideSuggest(force) {
		if(force == undefined) force = false;
		if (!isMouseOver || force) suggest_holder.hide();
		if (suggestTimeout != null) clearTimeout(suggestTimeout);
	}

	function SuggestionClick(id, obj) {
		var val = GetValue(id);
		ReplaceCurrentToken(obj, val + ",");
		HideSuggest(true);
		obj.focus();
	}

	function MakeSuggestionBox(elem) {
		var $elem = $(elem);

		suggest_holder = $("<div />").addClass("suggest-holder").css({
			position: 'absolute',
			zIndex: 10000,
			top: $elem.offset().top + $elem.height() + opts.suggestOffsetTop,
			left: $elem.offset().left + opts.suggestOffsetLeft,
			width: $elem.width(),
			height: opts.suggestHeight
		}).hide();

		suggest_holder.append("<ul />");

		suggest_holder.bind("mouseover", function() {
			if (suggestTimeout != null) clearTimeout(suggestTimeout);
			isMouseOver = true;
		});

		suggest_holder.bind("mouseout", function() {
			if (suggestTimeout != null) clearTimeout(suggestTimeout);
			suggestTimeout = setTimeout(HideSuggest, opts.suggestOpenTime);
			isMouseOver = false;
		});

		

		$(suggest_holder).prependTo("body");
		$(document).bind("click", HideSuggest);
		$(document).bind("keydown", function(e) {
			if (e.which == 27) HideSuggest();
		});
	}

	/**
	 * Tokenizer
	 */

	function GetSelection(elem) {
		if(elem.selectionStart) {
			// DOM3
			return {"start": elem.selectionStart, "end": elem.selectionEnd, "length": elem.selectionEnd - elem.selectionStart};
		} else if(document.selection) {
			// IE
			elem.focus();

			var r = document.selection.createRange();
			if (r == null) {
				return { start: 0, end: elem.value.length, length: 0 }
			}

			var re = elem.createTextRange();
			var rc = re.duplicate();
			re.moveToBookmark(r.getBookmark());
			rc.setEndPoint('EndToStart', re);

			return { start: rc.text.length, end: rc.text.length + r.text.length, length: r.text.length};
		}

		return { start: 0, end: elem.value.length, length: 0 }
	}

	function GetCurrentToken(elem) {
		sel = GetSelection(elem);
		var tokenStart = (elem.value.substr(0, sel.start).lastIndexOf(","))+1;
		//if(tokenStart == -1) tokenStart = 0;
		var tokenEnd = elem.value.indexOf(",", sel.start);
		if (tokenEnd == -1) tokenEnd = elem.value.length;

		return elem.value.substring(tokenStart, tokenEnd).trim();
	}

	function ReplaceCurrentToken(elem, repl) {
		sel = GetSelection(elem);
		var tokenStart = (elem.value.substr(0, sel.start).lastIndexOf(","));
		if(tokenStart == -1) tokenStart = 0;
		var tokenEnd = elem.value.indexOf(",", sel.start);
		if (tokenEnd == -1) tokenEnd = elem.value.length;

		elem.value = elem.value.substr(0, tokenStart) + " " + repl + " " + elem.value.substr(tokenEnd);
	}


	/***
	 * Key timer plugin - runs the key event after a timeout value
	 * @param func
	 * @param timeout
	 */
	$.fn.keytimer = function(func, timeout) {
		//var timer = null;
		if(timeout == undefined) timeout = 300;

		return this.each(function() {
			var _this = this;
			var _running = false;
			$(this).keydown(function(e) {
				if(_running) return;
				clearTimeout($.data(this, "timeout"));
				_running = true;
				var timer = setTimeout(function() { func.call(_this, e); $.data(_this, "timeout", timer); _running=false; }, timeout);
			});
		});
	};


	/**
	 * The main class
	 */
	$.fn.tagedit = function(options) {
		opts = $.extend(defaults, options);
		// return jquery object
		return this.each(function() {
			var $this = $(this);
			var _this = this;

			$this.attr("autocomplete","off");
			
			MakeSuggestionBox(this);
			

			$this.keytimer(function(e) {
				AutoSuggest.call(this, e); // do the auto suggest
				RefreshTags();
				var tag_array = this.value.split(/\s*,\s*/);
				for(var i in tag_array) {
					AddTag(tag_array[i]);
				}
				
			}, 750);
		});
	};

})(jQuery);
