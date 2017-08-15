<?php
namespace App\Classes;

use Illuminate\Http\Request;
use DB;

Class GetRelatives {
	public function get($userId){
		$data = DB::table('relationship')
	      	->select('parent_userData_id', 'parent_to_child_relation', 'child_to_parent_relation', 'child_userData_id')
	      	->where('parent_userData_id', '=', $userId)
	      	->orWhere('child_userData_id', '=', $userId)
	      	->get();

	    return $data;
	}
}