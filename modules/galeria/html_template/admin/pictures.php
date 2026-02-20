<div class="data">
	<?php echo Form::StartForm("add", ModuleHelper::GetFunctionLink("admin/pictures", array("id" => URI::GetNamedParam("id")))); ?>
	<div class="form">
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

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Kép"); ?></label>
			<input type="file" id="pickfiles" />
			<br class="clearfix"/>

			<div class="info">Tömeges feltöltéshez válasszon ki több képet</div>
		</div>

		<div id="file_list">
			
		</div>

		<script type="text/javascript" src="/jcrop/jquery.Jcrop.js?v=20210112"></script>
        <script type="text/javascript" src="/plupload/moxie.min.js?v=20210112"></script>
		<script type="text/javascript" src="/plupload/plupload.full.js?v=20210112"></script>
		
		<script type="text/javascript">

			var uploader = false;
			var queue_count = 0;
			function StartUpload() {
				uploader.start();
			}

			$(function() {
				uploader = new plupload.Uploader({
					runtimes : 'html5,flash,silverlight,html4',
					browse_button : 'pickfiles',
					max_file_size : '100mb',
					chunk_size: '1mb',
					unique_names: true,
					url : '/plupload/upload.php',
					flash_swf_url : '/plupload2/Moxie.swf',
					silverlight_xap_url : '/plupload/Moxie.xap',
					filters : [
						{title : "Image files", extensions : "jpg,gif,png"}
					]
				});
				uploader.init();

				uploader.bind('FilesAdded', function(up, files) {
					for(var i in files) {
						queue_count++;
						$("<div id='fileitem_"+ files[i].id +"' />").html(files[i].name + " (0 Kb / " + Math.round(files[i].size / 1024) + " Kb)").appendTo("#file_list");
						$("<input id='fileitemname_"+ files[i].id +"' name='files[]' type='hidden' />").val("").appendTo("#file_list");
					}

					//up.start();
					up.refresh(); // Reposition Flash/Silverlight
				});

				// When form is submitted
				$("#add").submit(function(e) {
					//console.log(queue_count);
				});

				uploader.bind('UploadProgress', function(up, file) {

					var cur_size = (file.percent / 100) * file.size;
					//console.log(cur_size);
					$('#fileitem_' + file.id).html(file.name + " (" + Math.round(cur_size / 1024) + " Kb / " + Math.round(file.size / 1024) + " Kb)" + file.percent + "%");
				});

				uploader.bind('FileUploaded', function(up, file) {
					$("#fileitemname_"+ file.id).val("images_uploaded/" + file.target_name);
					queue_count--;
					if(queue_count == 0) {
						$("form#add").trigger('submit');
					}
				});
			});
		</script>

		<div class="item">
			<label><span class="required">* <?php echo Localization::_("Kötelező"); ?></span></label>
			<input type="button" name="submitPictures" value="Mentés" class="submit" onclick="StartUpload();"/>
			<br class="clearfix"/>
		</div>
		<?php echo Form::EndForm(); ?>
	</div>


	<!-- image list -->
	<div class="image_list">
		<div class="operations">
			<div class="label">
				Kijelöltek
			</div>
			<div class="buttons">
				<a href="#" onclick="SwitchImage(); return false;" class="btn_felcserel">Felcserélése</a>
			</div>
			<br class="clearfix" />
		</div>

		<link href="/css/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		<!-- images -->
		<div class="images">
			<? foreach($pictures as $picture): ?>
			<!-- box -->
			<div class="box <? if($pictures->IsNth(4)): ?>no<? endif; ?>">
				<div class="pic">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td align="center" valign="middle">
								<img src="/<?php echo $this->ImageCache($picture->pic_path)->Crop($picture->pic_data)->ResizeImage(159, 159); ?>" alt="" />
							</td>
						</tr>
					</table>
					<div class="zoom"></div>
					<? if($picture->embed_code != ""): ?>
						<div id="embed_preview" style="display:none;"><?php echo $picture->embed_code; ?></div>
						<a href="#embed_preview" rel="prettyPhoto[gallery]" title="Ez a kép címe">Zoom</a>
					<? else: ?>
						<a href="/<?php echo $this->ImageCache($picture->pic_path)->Crop($picture->pic_data); ?>" rel="prettyPhoto[gallery]" title="Ez a kép címe">Zoom</a>
					<? endif ?>
				</div>

				<div class="txt">
					<?php echo $picture->title; ?> <? if($picture->embed_code != ""): ?> VIDEÓ <? endif; ?>
					<span><?php echo $picture->entry_date; ?></span>
					<span>Sorszám: <b><?php echo $picture->sort; ?></b></span>
				</div>

				<div class="edit">
					<div class="check">
						<input type="checkbox" name="sel_image" value="<?php echo $picture->id; ?>" onclick="SelectImage(this);" />
					</div>

					<img src="/images_admin/icons/icon_image_order.gif" alt="" class="order" />


					<div class="buttons">
						<a href="<?php echo ModuleHelper::GetFunctionLink("admin/pictures/edit", array("id" => $picture->id)); ?>"><img src="/images_admin/icons/icon_edit.png" alt="Szerkeszt" /></a>
						<a onclick="return DeleteRow();" href="<?php echo ModuleHelper::GetFunctionLink("admin/pictures/delete", array("id" => $picture->id)); ?>"><img src="/images_admin/icons/icon_delete.png" alt="Töröl" /></a>
					</div>
					<br class="clearfix" />
				</div>
			</div>
			<!-- box -->
			<? endforeach; ?>
			<br class="clearfix" />
		</div>
		<!-- images -->
		
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("a[rel^='prettyPhoto']").prettyPhoto({allow_resize: true, default_width: 600,default_height: 600});
			});
		</script>


		<script type="text/javascript">
			var selection = [];
			function SelectImage(obj) {
				var num_sel = $("input[name='sel_image']:checked").size();
				if(num_sel > 2) {
					$("input[name='sel_image']").attr("checked", false);
					$(obj).attr("checked", true);
					$.uniform.update();
					num_sel = 1;
				}
				if(num_sel == 2) {
					$("input[name='sel_image']:checked").each(function() {
						selection.push(this.value);
					});
				}
			}

			function SwitchImage() {
				if(selection.length != 2 || isNaN(selection[0]) || isNaN(selection[1])) {
					alert("Ki kell választani két képet!");
					return;
				}
				$("input[name='sel_1']").val(selection[0]);
				$("input[name='sel_2']").val(selection[1]);
				$("#switch_picture").submit();
			}
		</script>

		<?php echo Form::StartForm("switch_picture", ModuleHelper::GetFunctionLink("admin/pictures", array("id" => $pictures->galleries_id))); ?>
			<input type="hidden" name="sel_1" value="" />
			<input type="hidden" name="sel_2" value="" />
		<?php echo Form::EndForm(); ?>

		<div class="operations_bottom">
			<div class="label">
				Kijelöltek
			</div>
			<div class="buttons">
				<a href="#" onclick="SwitchImage(); return false;" class="btn_felcserel">Felcserélése</a>
			</div>
			<br class="clearfix" />
		</div>
	</div>
	<!-- eof image list -->
</div>