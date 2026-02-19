<?php
	$callback = $_GET["CKEditorFuncNum"];
	
	$path = "/home/users/jegv/public_html/images_uploaded/";
	$home_url = "http://".$_SERVER["HTTP_HOST"]."/images_uploaded/";
	$max_size = 3; // MByte
	$uploaded_file = $_FILES["upload"];
	$new_file = uniqid() . strrchr($uploaded_file["name"], ".");
	$new_path = $path . $new_file;
	
	if(move_uploaded_file($uploaded_file["tmp_name"], $new_path) === FALSE 
		|| $uploaded_file["size"] > $max_size*1024*1024) {
		$url = "";
		$msg = "Nem sikerült feltölteni a fájlt, vagy a fájl nagyobb a megengedett méretnél ($max_size MB)";
	} else {
		$url = $home_url . $new_file;
		$msg = "A fájlt sikeresen feltöltötte!";
	}
	$output = '<html><body><script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.$callback.', "'.$url.'","'.utf8_encode($msg).'");</script></body></html>';
	echo $output;
?>