<link href="/css/expand.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript" src="/js/sp-expandbox.js"></script>	
<script type="text/javascript">
	function FilterInput(obj) {
		len = obj.value.length;
		if (obj.value[len-1].match(/[^a-z0-9_-]/)) {
			obj.value= obj.value.substring(0, len-1);
		}
	}
	
	var json_obj = eval('<?php echo $categories; ?>');
	expandbox.addElements(json_obj);
	
	function GoToURL(obj, link) {
		var selection = obj.options[obj.selectedIndex].value;
		window.location = "http://" + document.domain + "/" + link + selection;
	}

	//alert(expandbox.buildChilds(1));
	//alert(expandbox.max_depth);
</script>

<div class="data">
	<div class="form">
		<?php echo Form::StartForm("edit", ModuleHelper::GetFunctionLink("admin/edit", array("id" => $item->id)), "post", "multipart/form-data"); ?>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Parent location"); ?></label>
			<div class="ckeditor">
				<script type="text/javascript">
					expandbox.render(true);
					expandbox.renderHiddenInput("category_id");
					expandbox.setSelected('<?php echo $item->id; ?>', false);
				</script>
				<br class="clearfix" />
			</div>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Title"); ?></label>
			<input type="text" name="title" value="<?php echo $item->title; ?>" class="input_normal" />
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Rövid leírás"); ?></label>
			<textarea name="description" class="textfield_small"><?php echo $item->description; ?></textarea>
			<br class="clearfix"/>
			<div class="info">Csak az aktuális ajánlatoknál kell kitölteni.</div>
		</div>

        <div class="item">
			<label><span>*</span> <?php echo Localization::_("Sorrend"); ?></label>
			<input type="text" name="sort_order" value="<?php echo $item->sort_order; ?>" class="input_normal" />
			<br class="clearfix"/>
            <div class="info">Minél kisebb szám (0 és X) között annál előrébb kerül a sorban!</div>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Kezdet"); ?></label>
			<input type="text" name="from_date" value="<?php echo $item->from_date; ?>" class="input_normal" />
			<br class="clearfix"/>
			<div class="info">Csak az aktuális ajánlatoknál kell kitölteni.</div>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Vég"); ?></label>
			<input type="text" name="to_date" value="<?php echo $item->to_date; ?>" class="input_normal" />
			<br class="clearfix"/>
			<div class="info">Csak az aktuális ajánlatoknál kell kitölteni.</div>
		</div>

		<div class="item">
			<label><span class="required">* <?php echo Localization::_("Required"); ?></span></label>
			<input type="submit" name="submit" value="Save" class="submit"/>
			<br class="clearfix"/>
		</div>
		<?php echo Form::EndForm(); ?>
	</div>
</div>
