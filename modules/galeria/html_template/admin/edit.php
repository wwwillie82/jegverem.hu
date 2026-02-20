<div class="data">
	<div class="form">
		<?php echo Form::StartForm("edit", ModuleHelper::GetFunctionLink("admin/edit", array("id" => $gallery->id))); ?>
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Cím"); ?></label>
			<input type="text" name="title" value="<?php echo $gallery->title; ?>" class="input_long"/>
			<br class="clearfix"/>
		</div>

        <div class="item">
			<label><span>*</span> <?php echo Localization::_("Cím DE"); ?></label>
			<input type="text" name="title_de" value="<?php echo $gallery->title_de; ?>" class="input_long"/>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Cím EN"); ?></label>
			<input type="text" name="title_en" value="<?php echo $gallery->title_en; ?>" class="input_long"/>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Publikus"); ?></label>

			<div class="checkboxes">
				<?php echo HtmlBuilder::HtmlBuilder("input")->type("radio")->name("active")->value(0, $gallery->active); ?> <?php echo Localization::_("Nem"); ?></span>
				<?php echo HtmlBuilder::HtmlBuilder("input")->type("radio")->name("active")->value(1, $gallery->active); ?> <span class="check_text"><?php echo Localization::_("Igen"); ?></span>
			</div>
			<br class="clearfix"/>
		</div>

		<link href="/jcrop/jquery.Jcrop.css" type="text/css" rel="stylesheet" />
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Kép"); ?></label>
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
				<img id="cropper" src="/<?php echo $gallery->pic_path; ?>" alt="" />
				<input type="hidden" name="picture_filename" value="<?php echo $gallery->pic_path; ?>" />
				<? $crop = unserialize($gallery->pic_data); ?>
				<input type="hidden" name="crop_x" value="<?php echo $crop[0]; ?>" />
				<input type="hidden" name="crop_y" value="<?php echo $crop[1]; ?>" />
				<input type="hidden" name="crop_w" value="<?php echo $crop[2]; ?>" />
				<input type="hidden" name="crop_h" value="<?php echo $crop[3]; ?>" />
			</div>

			<br class="clearfix"/>
		</div>

		<script type="text/javascript" src="/jcrop/jquery.Jcrop.js?v=20210112"></script>
        <script type="text/javascript" src="/plupload/moxie.min.js?v=20210112"></script>
		<script type="text/javascript" src="/plupload/plupload.full.js?v=20210112"></script>
		<script type="text/javascript" src="/js/loadjcrop.js?v=20210112"></script>
		<script type="text/javascript">
			$(window).load(function() {
				LoadJCrop(287 / 159, '<?php echo implode("','", $crop); ?>');
			});
		</script>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Dátum"); ?></label>
			<input type="text" name="entry_date" value="<?php echo $gallery->entry_date; ?>" class="input_normal"/>
			<br class="clearfix"/>

			<div class="info"><?php echo Localization::_("Formátum"); ?>: <?php echo date("Y-m-d"); ?></div>
		</div>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Rövid leírás"); ?></label>
			<textarea name="short_text" class="textfield_medium"><?php echo $gallery->short_text; ?></textarea>
			<br class="clearfix"/>
		</div>

        <div class="item">
			<label><span>*</span> <?php echo Localization::_("Rövid leírás DE"); ?></label>
			<textarea name="short_text_de" class="textfield_medium"><?php echo $gallery->short_text_de; ?></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Rövid leírás EN"); ?></label>
			<textarea name="short_text_en" class="textfield_medium"><?php echo $gallery->short_text_en; ?></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span class="required">* <?php echo Localization::_("Kötelező"); ?></span></label>
			<input type="submit" name="submit" value="Mentés" class="submit"/>
			<br class="clearfix"/>
		</div>
		<?php echo Form::EndForm(); ?>
	</div>
</div>
