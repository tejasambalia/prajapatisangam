<?php
namespace App\Classes;
use App\content_video;

Class GetLatestData {
	public function GetLatestData() {
		//get video data
		$obj = new content_video;
		$data = $obj->get();
		return $data;
	}
}