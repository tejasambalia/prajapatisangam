<?php

namespace App\Http\Controllers;

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
//include (App\Classes\General.php);

class UsersController extends Controller
{
	public function store(Request $request)
  { 
    $data = $request->only('email', 'password');
    $api = $request->only('api');
    // $usermodel = new User;
    // $usermodel->email = $data['email'];
    // $usermodel->password = $data['password'];
    // $usermodel->save();
    // die();
    
    if($api['api']==1){
      //api validation
      $validator = $this->validator($data);
      if($validator->fails()){
        return Response::json(['errors' => $validator->getMessageBag()->toArray()], 200);
      }
        
    }
    else{
      //laravel validation
      $validator = $this->validate($request, User::$signup_validation_rules);
    }

    //generate user_id     
    $usr_string = str_random(3);
    $characters = 'qwertyuioplkjhgfdsazxcvbnm';

    // generate a pin based on 2 * 1 digits + a random character
    $usr_pin = mt_rand(1, 9)
    . mt_rand(1, 9)
    . $characters[rand(0, strlen($characters) - 1)];
    
    $data['user_id'] = str_shuffle($usr_pin).md5(date('Y-m-d H:i:s:u'));

    //generating verification_code
    $string = str_random(15);
    //generate pin
    $pin = mt_rand(10000, 99999)
    . mt_rand(10000, 99999)
    . $characters[rand(0, strlen($characters) - 1)]
    . $characters[rand(0, strlen($characters) - 1)]
    . $characters[rand(0, strlen($characters) - 1)]
    . $characters[rand(0, strlen($characters) - 1)]
    . $characters[rand(0, strlen($characters) - 1)];

    $data['verification_code'] = str_shuffle($pin);


    $data['password'] = bcrypt($data['password']);        
    $user = User::create($data);
     
    if($user){
        //send verification email
        $mail_data = array(
            'verify' => "verify",
            'user_id' => $data['user_id'],
            'verification_code' => $data['verification_code'],
            'email' => $data['email']
        );            

        Mail::send('mail.emailverify', $mail_data, function ($message) use ($data) {

            $message->from('art@virtul.in', 'VirtuL');

            $message->to($data['email'])->subject('Verify VirtuL Account');

    		});
    }
    if($api['api']==1){
      return Response::json(['success' => 'true'], 200);
    }
    else{
      $msg = 'We have send you verification email please verify it';
      session(['msg' => $msg]);
      return redirect()->route('signin');
    }
  }

  public function handleSignin(Request $request){
    $data = $request->only('email', 'password');
    $api = $request->only('api');

    if($api['api']==1){
      //api validation
      $validator = $this->signinValidator($data);
      if($validator->fails()){
        return Response::json(['errors' => $validator->getMessageBag()->toArray()], 200);
      }
        
    }
    else{
      //laravel validation
      $validator = $this->validate($request, User::$signin_validation_rules);
    }

    //check email verification is done or not
    $check_verified = DB::table('users')->where('email', $data['email'])->value('verified');
    if(\Auth::attempt($data)&&$check_verified){
        //$role = DB::table('users')->where('email', $request['email'])->value('role');
      if($api['api']==1){
        echo "success login";die();
        return Response::json(['success' => 'true'], 200);
      }
      else{
        return redirect('/');
      }
    }
    else{
      if($api['api']==1){
        if($check_verified==0){
          $msg = "Email Address is not verified!";
        }
        else{
          $msg = "User name or password is invalid";
        }
        return Response::json(['errors' => $msg], 200);
      }
      else{
        $msg = "User name or password is invalid";
        return back()->withInput()->withErrors(['email' => $msg]);   
      }
    }
  }

    //verify email and user
    public function verify($userid, $verifyid){
        //get verification code from database
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
    }

    public function forgetPassword(Request $request){
		$this->validate($request, User::$forget_password_validation_rules);      
   		$data = $request->only('email'); 
   		
   		$verification = DB::table('users')   	
   			->select('verification_code')
   			->where('email', '=', $data['email'])
   			->get();
   		
   		$mail_data['verification_code'] = $verification[0]->verification_code;

   		//send mail 
        Mail::send('reSetPassword', $mail_data, function ($message) use ($data) {

	        $message->from('namaste@knowamp.com', 'KnowAmp');

	        $message->to($data['email'])->subject('Reset password');
    	});

    	return back();
    }

    public function resetPassword($verifyid){
    	$title = "Reset password | KnowAmp";
      $meta_description = "Reset password for KnowAmp. KnowAmp is Q&A community for AMPs (Accelerated Mobile Pages).";
    	$data['verifyid'] = $verifyid;

    	return view('resetPass', compact('title', 'data', 'meta_description'));
    }

    public function handleResetPassword(Request $request){
    	$this->validate($request, User::$handle_reset_validation_rules);      
   		$data = $request->only('password', 'confirm_password', 'verification_code');

   		if($data['password']==$data['confirm_password']){
   			$password = bcrypt($data['password']);

   			DB::table('users')
	            ->where('verification_code', $data['verification_code'])
	            ->update(['password' => $password]);

	        $msg = "Password updated successfully!";
	        session(['msg' => $msg]);
	        return redirect('/');
   		}
   		else{
   			$msg = "Password and confirm password doesn't match";
   			return back()->withErrors([$msg]);
   		}
    }

    public function signin(){
      return view('users.signin');
    }

    public function signup(){
      return view('users.signup');
    }

    private function validator($data){
      return Validator::make($data, array(
        'email' => 'required|email|unique:users',
        'password' => 'required'
      ));
    }

    private function signinValidator($data){
      return Validator::make($data, array(
        'email' => 'required|email|exists:users',
        'password' => 'required'
      ));
    }

    public function userVerification($userid,$verificationcode)
    {
        $verifyObject = new General();
        $verifyObject->verifyByUserIdVerifyId($userid,$verificationcode);       
    }

//get
    public function viewProfile(Request $request)
    {
      $test = 2;
      session(['loggedInUser' => $test]);//for testing 

      $userId = session('loggedInUser');
      $profileObj = new UserProfile;  
      if($userId == null)
      {
        return view('accounts.manageprofile',['userprofile'=>$profileObj]);
      }
      else
      {
        $profileObj =UserProfile :: findByUserId($userId);
        //$profileObj = $generalObj->GetUserDataById($userId);

        return view('accounts.manageprofile',['userprofile'=>$profileObj]);
      }
        
    }

//post
    public function manageProfile(Request $request)
    {
      dd($request->all());
      $profilePicture = dd($request->file('profilePicture'));
      if($profilePicture == 
        null)
      {
        echo 'ok';
      }
      print_r($profilePicture);
        die();
       // $imageName = $product->id . '.' . 
       //  $request->file('image')->getClientOriginalExtension();
      echo $profilePicture;die();
         $rules = array('profilePicture' => 'required|mimes:jpeg,bmp,png',);
         $validator = Validator::make($file, $rules);
         if ($validator->fails()) {
             // send back to the page with the input data with errors
             return 'Image not valid';
         }

      $data = $request->only('Contact', 'fbLink','twitterLink','pinterestLink','website','DOB','profilePicture');
      $usermodel = new UserProfile;
    
      $usermodel->Contact = $data['Contact'];
      $usermodel->fbLink = $data['fbLink'];
      $usermodel->twitterLink = $data['twitterLink'];
      $usermodel->pinterestLink = $data['pinterestLink'];
      $usermodel->website = $data['website'];
      $usermodel->DOB = $data['DOB'];
      $usermodel->save();
      die();  
      

    }
}