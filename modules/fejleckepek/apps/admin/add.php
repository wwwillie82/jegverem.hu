<?php
class Fejleckepek_add extends Controller {
	private function normalize($str, $delimiter = "-") {
		$str = strtolower($str);
		$from = array("ö", "ü", "ó", "ő", "ú", "á", "ű", "í", "é");
		$to = array("o", "u", "o", "o", "u", "a", "u", "i", "e");
		$str = str_replace($from, $to, $str);

		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		return $clean;
	}

	private function GetPicturePath($picture_filename) {
		if (empty($picture_filename) || strpos($picture_filename, "..") !== false) {
			return false;
		}

		$document_root = !empty($_SERVER["DOCUMENT_ROOT"]) ? rtrim($_SERVER["DOCUMENT_ROOT"], "/") : realpath(dirname(__FILE__) . "/../../../../");
		if (empty($document_root)) {
			return false;
		}

		return $document_root . "/" . ltrim($picture_filename, "/");
	}

	private function ValidatePicture($picture_filename) {
		$picture_path = $this->GetPicturePath($picture_filename);
		if ($picture_path == false || !is_file($picture_path) || @filesize($picture_path) <= 0) {
			return false;
		}

		$image_info = @getimagesize($picture_path);
		if ($image_info === false || empty($image_info[2])) {
			return false;
		}

		if (!in_array($image_info[2], array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF))) {
			return false;
		}

		if (!function_exists("imagecreatefromstring")) {
			return false;
		}

		$image_data = @file_get_contents($picture_path);
		if ($image_data === false) {
			return false;
		}

		$image_resource = @imagecreatefromstring($image_data);
		if ($image_resource === false) {
			return false;
		}

		imagedestroy($image_resource);
		return true;
	}

	private function ValidateCropData($data) {
		$crop_fields = array(
			"crop_x" => 0,
			"crop_y" => 0,
			"crop_w" => 1,
			"crop_h" => 1
		);

		$normalized = array();
		foreach($crop_fields as $field => $minimum) {
			if (!isset($data[$field])) {
				return false;
			}

			$value = trim((string) $data[$field]);
			if ($value === "" || strcasecmp($value, "nan") === 0 || !is_numeric($value)) {
				return false;
			}

			$value = (float) $value;
			if ($field == "crop_w" || $field == "crop_h") {
				if ($value <= 0) return false;
			} else {
				if ($value < 0) return false;
			}

			$normalized[$field] = $value;
		}

		return $normalized;
	}

	private function RejectInvalidCrop($redirect_url, $crop_data) {
		Sessions::GetInstance()->SetFlashdata("acl_error", Localization::_("A kijelölt képkivágás érvénytelen."));
		error_log("Rejected invalid cover crop in fejleckepek/add: '" . json_encode($crop_data) . "'");
		URI::Redirect($redirect_url);
		exit;
	}

	private function RejectInvalidPicture($redirect_url, $picture_filename) {
		Sessions::GetInstance()->SetFlashdata("acl_error", Localization::_("A feltöltött fejléckép nem érvényes JPG, PNG vagy GIF kép."));
		error_log("Rejected invalid cover image in fejleckepek/add: '" . $picture_filename . "'");
		URI::Redirect($redirect_url);
		exit;
	}

	function main() {
		ModuleHelper::SetBreadcrumb(array(Localization::_("Fejléckép"), Localization::_("Feltöltése")));
		Form::OnSubmit("add", array($this, "Submit"));

		$this->view->columns = $this->db->Query("SELECT * FROM cover_columns ORDER BY name");
		$this->view->display("admin/add");
	}

	function Submit($data) {
		$redirect_url = ModuleHelper::GetFunctionLink("admin/add");
		if (empty($data["picture_filename"]) || !$this->ValidatePicture($data["picture_filename"])) {
			$this->RejectInvalidPicture($redirect_url, isset($data["picture_filename"]) ? $data["picture_filename"] : "");
		}

		$crop_data = $this->ValidateCropData($data);
		if ($crop_data === false) {
			$this->RejectInvalidCrop($redirect_url, array(
				"crop_x" => isset($data["crop_x"]) ? $data["crop_x"] : null,
				"crop_y" => isset($data["crop_y"]) ? $data["crop_y"] : null,
				"crop_w" => isset($data["crop_w"]) ? $data["crop_w"] : null,
				"crop_h" => isset($data["crop_h"]) ? $data["crop_h"] : null
			));
		}

		$row = new DbRow();
		
		$row->columns_id = $data["columns_id"];
		$row->sort_order = $data["sort_order"];
		$row->description = $data["description"];

		$row->pic_path = $data["picture_filename"];
		$row->pic_data = serialize(array($crop_data["crop_x"], $crop_data["crop_y"], $crop_data["crop_w"], $crop_data["crop_h"]));
		$this->db->Insert("covers", $row);
	}
}
