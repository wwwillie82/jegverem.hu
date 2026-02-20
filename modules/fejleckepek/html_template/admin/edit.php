<div class="data">
	<div class="form">
		<?php echo Form::StartForm("edit", ModuleHelper::GetFunctionLink("admin/edit", array("id" => $cover->id))); ?>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Oldal"); ?></label>
			<select name="columns_id">
				<? foreach($columns as $column): ?>
				<option value="<?php echo $column->id; ?>" <? if($column->id == $cover->columns_id): ?>selected="selected"<? endif; ?>><?php echo $column->name; ?></option>
				<? endforeach; ?>
			</select>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Sorrend"); ?></label>
			<input type="text" name="sort_order" value="<?php echo $cover->sort_order; ?>" class="input_normal"/>
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
				<img id="cropper" src="/<?php echo $cover->pic_path; ?>" alt="" />
				<input type="hidden" name="picture_filename" value="<?php echo $cover->pic_path; ?>" />
				<? $crop = unserialize($cover->pic_data); ?>
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
				LoadJCrop(631 / 381, '<?php echo implode("','", $crop); ?>');
			});
		</script>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Rövid leírás"); ?></label>
			<textarea name="description" class="textfield_small"><?php echo $cover->description; ?></textarea>
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
