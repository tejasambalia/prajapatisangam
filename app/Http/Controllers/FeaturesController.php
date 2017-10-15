<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Storage;
use Validator;
use Response;
use App\Classes\SearchLogic;
use App\Classes\ViewCounter;
use App\Classes\General;
use App\content_user;
use Image;

class FeaturesController extends Controller{
	public function video($title, $id){
		$viewCounter = new ViewCounter;
		$viewCounter->videoViewCounter($id);
		return view('content.video', compact('id'));
	}

	public function news(){
		return view('content.news');
	}

	public function upload(){
		return view('content.upload');
	}

	public function handleUpload(Request $request){
		$data = $request->only('title', 'description', 'attachment');
		$this->validate($request, [

	        'attachment' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

	    ]);
	    $image = $request->file('attachment');
	    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
	    $destinationPath = public_path('img');
	    $img = Image::make($image->getRealPath());
	    $img->resize(200, 200, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['imagename']);
		unset($data['attachment']);

		$obj = new General;
		$data['image_link'] = $obj->getUserImagePath($input['imagename']);

		content_user::insert($data);

		$msg = "Content uploaded successfully";
		return redirect()->route('profile')->withErrors(['notification' => $msg]);
	}

	public function publicContent(){
		return view('content.public-content');
	}
}