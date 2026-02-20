<div class="data">
	<?php echo Form::StartForm("edit_image", ModuleHelper::GetFunctionLink("admin/pictures/edit", array("id" => $picture->id))); ?>
	<div class="form">
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Cím"); ?></label>
			<input type="text" name="title" value="<?php echo $picture->title; ?>" class="input_long"/>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Cím DE"); ?></label>
			<input type="text" name="title_de" value="<?php echo $picture->title_de; ?>" class="input_long"/>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Cím EN"); ?></label>
			<input type="text" name="title_en" value="<?php echo $picture->title_en; ?>" class="input_long"/>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Publikus"); ?></label>

			<div class="checkboxes">
				<?php echo HtmlBuilder::HtmlBuilder("input")->type("radio")->name("active")->value(0, $picture->active); ?> <?php echo Localization::_("Nem"); ?></span>
				<?php echo HtmlBuilder::HtmlBuilder("input")->type("radio")->name("active")->value(1, $picture->active); ?> <span class="check_text"><?php echo Localization::_("Igen"); ?></span>
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
				<img id="cropper" src="/<?php echo $picture->pic_path; ?>" alt="" />
				<input type="hidden" name="picture_filename" value="<?php echo $picture->pic_path; ?>" />
				<? $crop = unserialize($picture->pic_data); ?>
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
			$(function() {
				LoadJCrop(false);
			});
		</script>

		<div class="item">
			<label><span class="required">* <?php echo Localization::_("Kötelező"); ?></span></label>
			<input type="submit" name="submit" value="Mentés" class="submit"/>
			<br class="clearfix"/>
		</div>
		<?php echo Form::EndForm(); ?>
	</div>


</div>