<div class="data">
	<?= Form::StartForm("edit_image", ModuleHelper::GetFunctionLink("admin/pictures/edit", array("id" => $picture->id))) ?>
	<div class="form">
		<div class="item">
			<label><span>*</span> <?= Localization::_("Cím") ?></label>
			<input type="text" name="title" value="<?= $picture->title ?>" class="input_long"/>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Cím DE") ?></label>
			<input type="text" name="title_de" value="<?= $picture->title_de ?>" class="input_long"/>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Cím EN") ?></label>
			<input type="text" name="title_en" value="<?= $picture->title_en ?>" class="input_long"/>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?= Localization::_("Publikus") ?></label>

			<div class="checkboxes">
				<?= HtmlBuilder::HtmlBuilder("input")->type("radio")->name("active")->value(0, $picture->active) ?> <?= Localization::_("Nem") ?></span>
				<?= HtmlBuilder::HtmlBuilder("input")->type("radio")->name("active")->value(1, $picture->active) ?> <span class="check_text"><?= Localization::_("Igen") ?></span>
			</div>
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
				<img id="cropper" src="/<?= $picture->pic_path ?>" alt="" />
				<input type="hidden" name="picture_filename" value="<?= $picture->pic_path ?>" />
				<? $crop = unserialize($picture->pic_data); ?>
				<input type="hidden" name="crop_x" value="<?= $crop[0] ?>" />
				<input type="hidden" name="crop_y" value="<?= $crop[1] ?>" />
				<input type="hidden" name="crop_w" value="<?= $crop[2] ?>" />
				<input type="hidden" name="crop_h" value="<?= $crop[3] ?>" />
			</div>

			<br class="clearfix"/>
		</div>

		<script type="text/javascript" src="/jcrop/jquery.Jcrop.js"></script>
		<script type="text/javascript" src="/plupload/plupload.full.js"></script>
		<script type="text/javascript" src="/js/loadjcrop.js"></script>
		<script type="text/javascript">
			$(function() {
				LoadJCrop(false);
			});
		</script>

		<div class="item">
			<label><span class="required">* <?= Localization::_("Kötelező") ?></span></label>
			<input type="submit" name="submit" value="Mentés" class="submit"/>
			<br class="clearfix"/>
		</div>
		<?= Form::EndForm() ?>
	</div>


</div>