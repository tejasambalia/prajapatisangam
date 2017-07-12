<?php
namespace App\Classes;

use Illuminate\Http\Request;
use App\Classes\Sms;

Class Sms {

	private function apiRequest($contact, $msg){
		$auth_key = "140349An8oDWzih58972245";
		$link = "https://control.msg91.com/api/sendhttp.php?authkey=".$auth_key."&mobiles=".$contact."&message=".$msg."&sender=MT-VPYM&route=1&country=91";
		$res = file_get_contents($link);
	}

	public function SendSms($contact, $msg)
	{
		try {
			$this->apiRequest($contact, $msg);	
		}
		catch (Exception $e) {
			echo "Message send failed!";die();
		}
	}
}