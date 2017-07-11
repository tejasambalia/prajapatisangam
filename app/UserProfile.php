<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Foundation\Auth\UserProfile as Authenticatable;

class UserProfile extends Model 
{
    //
    protected $fillable = [
        'userId', 'Contact', 'DOB', 'fbLink', 'pinterestLink', 'twitterLinnk', 'instaLink', 'Website', 'profilePicture'
    ];


    public static function findByUserid($userId)
    {
        $profileObj = DB::table('user_profiles')->where('userId', $userId)->first();
        return $profileObj;
    }
}
