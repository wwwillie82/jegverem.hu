<?php
/**
 * upload.php
 *
 * Copyright 2009, Moxiecode Systems AB
 * Released under GPL License.
 *
 * License: http://www.plupload.com/license
 * Contributing: http://www.plupload.com/contributing
 */

function UploadErrorResponse($code, $message) {
	die(json_encode(array(
		"jsonrpc" => "2.0",
		"error" => array(
			"code" => $code,
			"message" => $message
		),
		"id" => "id"
	)));
}

function UploadSuccessResponse() {
	die(json_encode(array(
		"jsonrpc" => "2.0",
		"result" => null,
		"id" => "id"
	)));
}

function ValidateUploadedImage($filePath, $originalFileName) {
	$extension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
	$allowed_extensions = array("jpg", "jpeg", "png", "gif");
	if (!in_array($extension, $allowed_extensions)) {
		return "Only JPG, PNG and GIF images are allowed.";
	}

	if (!is_file($filePath) || @filesize($filePath) <= 0) {
		return "The uploaded file is missing or empty.";
	}

	$image_info = @getimagesize($filePath);
	if ($image_info === false || empty($image_info[2])) {
		return "The uploaded file is not a valid image.";
	}

	$allowed_types = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
	if (!in_array($image_info[2], $allowed_types)) {
		return "Only JPG, PNG and GIF images are allowed.";
	}

	if (!function_exists("imagecreatefromstring")) {
		return "Image validation is not available on the server.";
	}

	$image_data = @file_get_contents($filePath);
	if ($image_data === false) {
		return "The uploaded image could not be read.";
	}

	$image_resource = @imagecreatefromstring($image_data);
	if ($image_resource === false) {
		return "The uploaded image is corrupt or unreadable.";
	}

	imagedestroy($image_resource);
	return true;
}

// HTTP headers for no cache etc
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: application/json");

// Settings
//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
$targetDir = '../images_uploaded/';

//$cleanupTargetDir = false; // Remove old files
//$maxFileAge = 60 * 60; // Temp file age in seconds

// 5 minutes execution time
@set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);

// Get parameters
$chunk = isset($_REQUEST["chunk"]) ? (int) $_REQUEST["chunk"] : 0;
$chunks = isset($_REQUEST["chunks"]) ? (int) $_REQUEST["chunks"] : 0;
$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

// Clean the fileName for security reasons
$fileName = preg_replace('/[^\w\._]+/', '', $fileName);

// Make sure the fileName is unique but only if chunking is disabled
if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
	$ext = strrpos($fileName, '.');
	$fileName_a = substr($fileName, 0, $ext);
	$fileName_b = substr($fileName, $ext);

	$count = 1;
	while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
		$count++;

	$fileName = $fileName_a . '_' . $count . $fileName_b;
}

// Create target dir
if (!file_exists($targetDir))
	@mkdir($targetDir);

// Remove old temp files
/* this doesn't really work by now
	
if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
	while (($file = readdir($dir)) !== false) {
		$filePath = $targetDir . DIRECTORY_SEPARATOR . $file;

		// Remove old temp files if they are older than the max age
		if (preg_match('/\\.tmp$/', $file) && (filemtime($filePath) < time() - $maxFileAge))
			@unlink($filePath);
	}

	closedir($dir);
} else
	UploadErrorResponse(100, "Failed to open temp directory.");
*/

// Look for the content type header
$contentType = isset($_SERVER["HTTP_CONTENT_TYPE"]) ? $_SERVER["HTTP_CONTENT_TYPE"] : '';
if (isset($_SERVER["CONTENT_TYPE"])) {
	$contentType = $_SERVER["CONTENT_TYPE"];
}

$targetPath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

// Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
if (strpos($contentType, "multipart") !== false) {
	if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
		// Open temp file
		$out = fopen($targetPath, $chunk == 0 ? "wb" : "ab");
		if ($out) {
			// Read binary input stream and append it to temp file
			$in = fopen($_FILES['file']['tmp_name'], "rb");

			if ($in) {
				while ($buff = fread($in, 4096))
					fwrite($out, $buff);
			} else {
				UploadErrorResponse(101, "Failed to open input stream.");
			}
			fclose($in);
			fclose($out);
			@unlink($_FILES['file']['tmp_name']);
		} else {
			UploadErrorResponse(102, "Failed to open output stream.");
		}
	} else {
		UploadErrorResponse(103, "Failed to move uploaded file.");
	}
} else {
	// Open temp file
	$out = fopen($targetPath, $chunk == 0 ? "wb" : "ab");
	if ($out) {
		// Read binary input stream and append it to temp file
		$in = fopen("php://input", "rb");

		if ($in) {
			while ($buff = fread($in, 4096))
				fwrite($out, $buff);
		} else {
			UploadErrorResponse(101, "Failed to open input stream.");
		}

		fclose($in);
		fclose($out);
	} else {
		UploadErrorResponse(102, "Failed to open output stream.");
	}
}

$is_last_chunk = ($chunks < 2) || ($chunk === ($chunks - 1));
if ($is_last_chunk) {
	$validation_result = ValidateUploadedImage($targetPath, $fileName);
	if ($validation_result !== true) {
		error_log("plupload/upload.php rejected invalid image '" . $targetPath . "': " . $validation_result);
		@unlink($targetPath);
		UploadErrorResponse(104, $validation_result);
	}
}

// Return JSON-RPC response
UploadSuccessResponse();
?>
