(function() {
/*
	Load jcrop
 */
	var jcrop = false;
	var aspect_ratio = 1;

	function LoadJCrop(aspect, x, y, w, h) {
		setTimeout(function() {
			if(w == undefined || h == undefined) {
				if(aspect==undefined || aspect == false) aspect_ratio=false;
				aspect_ratio=aspect;
			}
			else {
				if(aspect != false)
					aspect_ratio = w / h;
				else
					aspect_ratio = false;
			}
			$("#cropper").show();
			jcrop = $.Jcrop("#cropper", {boxWidth: 500, allowSelect: false});


			var bounds = jcrop.getBounds();
			x = parseInt(x) || 0, y = parseInt(y) || 0, w = parseInt(w) || bounds[0], h = parseInt(h) || bounds[1];
			jcrop.setSelect([x, y, x+w, y+h]);
			var updateCoords = function(c) {
				for(var i in c) {
					$("[name='crop_" + i + "']").val(c[i]);
				}
			};
			if(aspect_ratio != false)
				jcrop.setOptions({aspectRatio: aspect_ratio});
			jcrop.setOptions({onChange: updateCoords, onSelect: updateCoords});
		}, 250);
	}

	$(function() {
		var uploader = new plupload.Uploader({
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
			$("#upload_filename").html(files[0].name + " (" + Math.round(files[0].size / 1024) + " Kb)");
			$("#crop_holder").show();

			up.start();
			up.refresh(); // Reposition Flash/Silverlight
		});

		uploader.bind('UploadProgress', function(up, file) {
			if (file.percent <= 99)
				$('#uploading_status').show().html("Feltöltés " + file.percent + "%");
		});

		uploader.bind('FileUploaded', function(up, file) {
			if(jcrop != false) {
				jcrop.destroy();
				$("#cropper").removeAttr("width").removeAttr("height").removeAttr("style").attr("src", "/");
			}
			$('#uploading_status').hide();
			$("#cropper").attr("src", "/images_uploaded/" + file.target_name);
			$("[name='picture_filename']").val("images_uploaded/" + file.target_name);
			setTimeout(function() {
				jcrop = LoadJCrop(aspect_ratio);
			}, 350);
		});
	});
	window.LoadJCrop = LoadJCrop;
})();