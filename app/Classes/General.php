<?php
namespace App\Classes;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\UserProfile;
use App\Classes\General;
use Mail;
use DB;
use Storage;
use Validator;
use Response;

Class General{

	function verifyByUserIdVerifyId($userid,$verifyid)
	{
		 $verification_code = DB::table('users')
        ->where('user_id', $userid)
        ->value('verification_code');
        //Check verified value 0 to 1 in database
        if($verification_code==$verifyid){
            //Change verified value 0 to 1 in database
            DB::table('users')
            ->where('user_id', $userid)
            ->update(['verified' => 1]);

            $msg = "User verified successfull";
            session(['msg' => $msg]);
            //redirect to the login page
            return redirect('/');
        }
        else{
        	$msg = "User doesn't verified";
          session(['msg' => $msg]);
        }
        echo $msg;
	}

    function GetUserDataById($userId)
    {
        $profileObj = new UserProfile;
        $profileObj = DB::table('user_profiles')->where('userId', $userId);
        
        return $profileObj;
    }
}


?>
