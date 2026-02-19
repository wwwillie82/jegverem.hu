<script type="text/javascript" src="/js/jquery.tagedit.js"></script>

<div class="data">
	<div class="form">
		<?= Form::StartForm("add", ModuleHelper::GetFunctionLink("admin/add")) ?>

		<div class="item">
			<label><span>*</span> <?= Localization::_("Kategória") ?></label>

			<div class="checkboxes">
				<select name="columns_id">
					<? foreach($columns as $column): ?>
						<?= HtmlBuilder::HtmlBuilder("option")->value($column->id, -1)->html($column->name) ?>
					<? endforeach; ?>
				</select>
			</div>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?= Localization::_("Cím") ?></label>
			<input type="text" name="title" value="" class="input_long"/>
			<br class="clearfix"/>
		</div>

		<link href="/jcrop/jquery.Jcrop.css" type="text/css" rel="stylesheet" />
		<div class="item">
			<label><span>*</span> <?= Localization::_("Kép") ?></label>
			<input type="file" id="pickfiles" />
			<br class="clearfix"/>
		</div>
		
		<div class="item" id="crop_holder">
			<label>&nbsp;</label>
			
			<div class="crop">
				<div class="status_upload">
					<span id="upload_filename"></span> <span id="upload_percent"></span><br />
					<span id="uploading_status"></span><br />
				</div>
				<img id="cropper" style="display:none;" src="/" alt="" />
				<input type="hidden" name="picture_filename" value="" />
				<input type="hidden" name="crop_x" value="" />
				<input type="hidden" name="crop_y" value="" />
				<input type="hidden" name="crop_w" value="" />
				<input type="hidden" name="crop_h" value="" />
			</div>
			
			<br class="clearfix"/>
		</div>

		<script type="text/javascript" src="/jcrop/jquery.Jcrop.js"></script>
		<script type="text/javascript" src="/plupload/plupload.full.js"></script>
		<script type="text/javascript" src="/js/loadjcrop.js"></script>
		<script type="text/javascript">
			$(function() {
				LoadJCrop(16 / 11);
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