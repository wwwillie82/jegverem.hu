<link href="/css/expand.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript" src="/js/sp-expandbox.js"></script>
<script type="text/javascript">
    var json_obj = eval('<?= $categories ?>');
    expandbox.addElements(json_obj);
</script>

<div class="data">
	<div class="form">
		<?= Form::StartForm("edit", ModuleHelper::GetFunctionLink("admin/edit", array("id" => $product->id))) ?>

        <div class="item">
			<label><span>*</span> <?= Localization::_("Termék kategória") ?></label>
			<div class="ckeditor">
                <div id="expandbox-selected-name" style="font-size: 14px; margin-bottom: 5px;"></div>
                <script type="text/javascript">
                    expandbox.render();
                    expandbox.renderHiddenInput("category_id");
                    expandbox.setSelected('<?= $product->categories_id ?>');
                </script>
                <br class="clearfix" />
			</div>
			<br class="clearfix"/>
		</div>

        <div class="item">
			<label><span>*</span> <?= Localization::_("Megnevezés") ?></label>
			<input type="text" name="name" value="<?= $product->name ?>" class="input_long" />
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Jellemző") ?></label>
			<input type="text" name="attribute" value="<?= $product->attribute ?>" class="input_normal" />
			<br class="clearfix"/>
			<div class="info">Pl.: 2 cl</div>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Ár") ?></label>
			<input type="text" name="price" value="<?= $product->price ?>" class="input_normal" /> Ft
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Kisadag Ár") ?></label>
			<input type="text" name="price_small" value="<?= $product->price_small ?>" class="input_normal" /> Ft
			<br class="clearfix"/>
		</div>

        <link href="/jcrop/jquery.Jcrop.css" type="text/css" rel="stylesheet" />
		<div class="item">
			<label><span>*</span> <?= Localization::_("Kép") ?></label>
			<input type="file" id="pickfiles" />
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label>&nbsp;</label>

			<div class="crop">
				<div class="status_upload">
					<span id="upload_filename"></span> <span id="upload_percent"></span><br />
					<span id="uploading_status"></span><br />
				</div>
				<img id="cropper" src="/<?= $product->pic_path ?>" alt="" />
				<input type="hidden" name="picture_filename" value="<?= $product->pic_path ?>" />
				<? $crop = unserialize($product->pic_data); ?>
				<input type="hidden" name="crop_x" value="<?= $crop[0] ?>" />
				<input type="hidden" name="crop_y" value="<?= $crop[1] ?>" />
				<input type="hidden" name="crop_w" value="<?= $crop[2] ?>" />
				<input type="hidden" name="crop_h" value="<?= $crop[3] ?>" />
			</div>

			<br class="clearfix"/>
		</div>

		<script type="text/javascript" src="/jcrop/jquery.Jcrop.js?v=20210112"></script>
        <script type="text/javascript" src="/plupload/moxie.min.js?v=20210112"></script>
		<script type="text/javascript" src="/plupload/plupload.full.js?v=20210112"></script>
		<script type="text/javascript" src="/js/loadjcrop.js?v=20210112"></script>
		<script type="text/javascript">
			$(window).load(function() {
                <? if($product->pic_path != ""): ?>
				LoadJCrop(189 / 104, '<?= implode("','", $crop) ?>');
                <? else: ?>
                LoadJCrop(189 / 104);
                <? endif; ?>
			});
		</script>

        <div class="item">
			<label><span>*</span> <?= Localization::_("Leírás") ?></label>
			<textarea name="description" class="textfield_small"><?= $product->description ?></textarea>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span class="required">* <?= Localization::_("Kötelező") ?></span></label>
			<input type="submit" name="submit" value="Mentés" class="submit"/>
			<br class="clearfix"/>
		</div>
		<?= Form::EndForm() ?>
	</div>
</div>
