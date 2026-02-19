<link href="/css/expand.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript" src="/js/sp-expandbox.js"></script>
<script type="text/javascript">
	function actionEdit() {
		if (expandbox.last_selected == -1) return false;
	    window.location = "admin/index/module:kategoriak|admin|edit/id:" + expandbox.last_selected;
		
		return false;
	}
	 
	function actionDelete() {
		if (expandbox.last_selected == -1) return false;
	    var reallydelete = confirm("Biztos akarod törölni a kijelöltet?");
	    
	    if (reallydelete) window.location = "admin/index/module:kategoriak|admin|index|delete/id:" + expandbox.last_selected;
		return false;
	}

	var json_obj = eval('<?= $categories ?>');
	expandbox.addElements(json_obj);
	
	
	
	function GoToURL(obj, link) {
		var selection = obj.options[obj.selectedIndex].value;
		window.location = "http://" + document.domain + "/" + link + selection;
	}
	
	//alert(expandbox.buildChilds(1));
	//alert(expandbox.max_depth);
</script>

<div class="data">
	<script type="text/javascript">
		expandbox.render();
		expandbox.renderHiddenInput("category_id");
	</script>
	<br class="clearfix" />
	
	<a href="#" onclick="return actionEdit();" class="btn_edit">Szerkeszt</a>
	<a href="#" onclick="return actionDelete();" class="btn_delete">Töröl</a>
</div>