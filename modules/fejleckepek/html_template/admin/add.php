<div class="data">
	<div class="form">
		<?= Form::StartForm("add", ModuleHelper::GetFunctionLink("admin/add")) ?>

		<div class="item">
			<label><span>*</span> <?= Localization::_("Oldal") ?></label>
			<select name="columns_id">
				<? foreach($columns as $column): ?>
				<option value="<?= $column->id ?>"><?= $column->name ?></option>
				<? endforeach; ?>
			</select>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Sorrend") ?></label>
			<input type="text" name="sort_order" value="0" class="input_normal"/>
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
				LoadJCrop(631 / 381);
			});
		</script>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Rövid leírás") ?></label>
			<textarea name="description" class="textfield_small"></textarea>
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