<div class="data">
	<div class="form">
		<?= Form::StartForm("edit", ModuleHelper::GetFunctionLink("admin/edit", array("id" => $cover->id))) ?>

		<div class="item">
			<label><span>*</span> <?= Localization::_("Oldal") ?></label>
			<select name="columns_id">
				<? foreach($columns as $column): ?>
				<option value="<?= $column->id ?>" <? if($column->id == $cover->columns_id): ?>selected="selected"<? endif; ?>><?= $column->name ?></option>
				<? endforeach; ?>
			</select>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Sorrend") ?></label>
			<input type="text" name="sort_order" value="<?= $cover->sort_order ?>" class="input_normal"/>
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
				<img id="cropper" src="/<?= $cover->pic_path ?>" alt="" />
				<input type="hidden" name="picture_filename" value="<?= $cover->pic_path ?>" />
				<? $crop = unserialize($cover->pic_data); ?>
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
				LoadJCrop(631 / 381, '<?= implode("','", $crop) ?>');
			});
		</script>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Rövid leírás") ?></label>
			<textarea name="description" class="textfield_small"><?= $cover->description ?></textarea>
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
