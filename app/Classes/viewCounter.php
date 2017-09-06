<?php
namespace App\Classes;

use Illuminate\Http\Request;
use DB;
use App\content_video;

Class ViewCounter {
	public function videoViewCounter($id) {
		$obj = new content_video;
		$data = $obj->getSingleColumn($id, 'view_count');
		if(count($data)>0){
			$count = $data->view_count;
			$count = $count+1;
			DB::table('content_video')
	            ->where('id', $id)
	            ->update(['view_count' => $count]);
		}
	}
}