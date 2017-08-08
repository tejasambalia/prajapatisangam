<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\UserData;
use App\UserAddress;
use App\Classes\General;
use App\Classes\Sms;
use Mail;
use DB;
use Storage;
use Validator;
use Response;

class UsersController extends Controller
{
	public function store(Request $request)
  { 
    $data = $request->only('contact', 'password');
    
    //laravel validation
    $validator = $this->validate($request, User::$signup_validation_rules);

    //generate user_id     
    $usr_string = str_random(3);
    $characters = 'qwertyuioplkjhgfdsazxcvbnm';

    // generate a pin based on 2 * 1 digits + a random character
    $usr_pin = mt_rand(1, 9)
    . mt_rand(1, 9)
    . $characters[rand(0, strlen($characters) - 1)];
    
    $data['user_id'] = str_shuffle($usr_pin).md5(date('Y-m-d H:i:s:u'));

    //generating verification_code
    $string = str_random(4);
    //generate pin
    $pin = mt_rand(10000, 99999);

    $data['verification_code'] = str_shuffle($pin);


    $data['password'] = bcrypt($data['password']);        
    $user = User::create($data);
     
    if($user){
        //send verification SMS
        $msg = 'Your verification code is '.$data['verification_code'].' - PRAJAPATI SANGAM';
        $sms = new Sms(); 
        $sms->SendSms($data['contact'], $msg);

      //   Mail::send('mail.emailverify', $mail_data, function ($message) use ($data) {

      //       $message->from('art@virtul.in', 'VirtuL');

      //       $message->to($data['email'])->subject('Verify VirtuL Account');

    		// });
    }

    $msg = 'We have send you verification code please verify it';
    session(['msg' => $msg]);
    return redirect()->route('signin');
  }

  public function handleSignin(Request $request){
    $data = $request->only('contact', 'password');
    //laravel validation
    $validator = $this->validate($request, User::$signin_validation_rules);

    //check verification is done or not
    $check_verified = DB::table('users')->where('contact', $data['contact'])->value('verified');
    if(\Auth::attempt($data)&&$check_verified){
        return redirect('/handleProfile');
    }
    else{
      $msg = "contact or password is invalid";
      return back()->withInput()->withErrors(['email' => $msg]);
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

  public function verify(){
    return view('users.verify');
  }

  public function handleVerify(Request $request){
    $this->validate($request, User::$handle_verify_validation_rules);

    //get data
    $contact = $request->only('contact');

    $verification = DB::table('users')    
      ->select('verified')
      ->where('contact', '=', $contact)
      ->get();

    if(!$verification[0]->verified){
      DB::table('users')
      ->where('contact', $contact)
      ->update(['verified' => 1]);

      $msg = "Verified successfully!";
      session(['msg' => $msg]);
    }
    else{
      $msg = "Already verified!";
      session(['msg' => $msg]);
    }
    return redirect()->route('signin');
  }

  public function userVerification()
  {
      $verifyObject = new General();
      $verifyObject->verifyByUserIdVerifyId($userid,$verificationcode);       
  }

  public function addProfile(){
    return view('users.addProfile');
  }

  public function editProfile(){
    return view('users.editProfile');
  }

  public function handleAddProfile(Request $request){
    //$validator = $this->validate($request, UserData::$validateData);
    $data = $request->only('firstName', 'middleName', 'surnameId', 'birthDate', 'gender', 'married', 'phone', 'email', 'website', 'homeTown', 'education', 'occupation', 'about', 'thoughts', 'address', 'state', 'city', 'pincode', 'relationSelect');
    
    $data['user_id'] = \Auth::user()->id;
    $data['relationSelect'] = ($data['relationSelect']==''?'1':$data['relationSelect']);
    $data['relationCreated'] = '0';

    $addressObj = UserAddress::add($data);
    $data['addressId'] = $addressObj;

    $userObj = UserData::addProfile($data);

    //set flag profile created
    DB::table('users')
      ->where('id', \Auth::user()->id)
      ->update(['profile_created' => '1']);

    $msg = "Data saved successfully";
    return redirect()->route('profile')->withErrors(['notification' => $msg]);
  }

  public function handleEditProfile(Request $request){
    //$validator = $this->validate($request, UserData::$validateData);
    $data = $request->only('firstName', 'middleName', 'surnameId', 'birthDate', 'gender', 'married', 'phone', 'email', 'website', 'homeTown', 'education', 'occupation', 'about', 'thoughts', 'address', 'state', 'city', 'pincode', 'relationSelect');

    $data['user_id'] = \Auth::user()->id;
    $data['relationSelect'] = ($data['relationSelect']==''?'1':$data['relationSelect']);
    
    $userObj = UserData::updateProfile($data);
    $data['addressId'] = $userObj->addressId;

    $addressObj = UserAddress::updateAddress($data);

    $msg = "Data updated successfully";
    return redirect()->route('profile')->withErrors(['notification' => $msg]);
  }

  public function profile(){
    return view('users.profile');
  }

  public function handleProfile(){
    $profileCreated = \Auth::user()->profile_created;
    if($profileCreated){
      return redirect()->route('profile');
    }
    else{
      return redirect()->route('addProfile'); 
    }
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

  public function logout()
  {
    \Auth::logout();
    return redirect('/');
  }
}