<div class="data">
	<div class="form">
		<?php echo Form::StartForm("add", ModuleHelper::GetFunctionLink("admin/add")); ?>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Cím"); ?></label>
			<input type="text" name="title" value="" class="input_long"/>
			<br class="clearfix"/>
		</div>

        <div class="item">
			<label><span>*</span> <?php echo Localization::_("Cím DE"); ?></label>
			<input type="text" name="title_de" value="" class="input_long"/>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Cím EN"); ?></label>
			<input type="text" name="title_en" value="" class="input_long"/>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Publikus"); ?></label>

			<div class="checkboxes">
				<input type="radio" name="active" value="0"/> <span class="check_text"><?php echo Localization::_("Nem"); ?></span>
				<input type="radio" name="active" value="1" checked="checked"/> <span class="check_text"><?php echo Localization::_("Igen"); ?></span>
			</div>
			<br class="clearfix"/>
		</div>

		<link href="/jcrop/jquery.Jcrop.css" type="text/css" rel="stylesheet" />
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Kép"); ?></label>
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

		<script type="text/javascript" src="/jcrop/jquery.Jcrop.js?v=20210112"></script>
        <script type="text/javascript" src="/plupload/moxie.min.js?v=20210112"></script>
		<script type="text/javascript" src="/plupload/plupload.full.js?v=20210112"></script>
		<script type="text/javascript" src="/js/loadjcrop.js?v=20210112"></script>
		<script type="text/javascript">
			$(function() {
				LoadJCrop(287 / 159);
			});
		</script>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Dátum"); ?></label>
			<input type="text" name="entry_date" value="<?php echo date("Y-m-d"); ?>" class="input_normal"/>
			<br class="clearfix"/>

			<div class="info"><?php echo Localization::_("Formátum"); ?>: <?php echo date("Y-m-d"); ?></div>
		</div>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Rövid leírás"); ?></label>
			<textarea name="short_text" class="textfield_medium"></textarea>
			<br class="clearfix"/>
		</div>

        <div class="item">
			<label><span>*</span> <?php echo Localization::_("Rövid leírás DE"); ?></label>
			<textarea name="short_text_de" class="textfield_medium"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Rövid leírás EN"); ?></label>
			<textarea name="short_text_en" class="textfield_medium"></textarea>
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