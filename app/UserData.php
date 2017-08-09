<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Foundation\Auth\UserProfile as Authenticatable;

class UserData extends Model 
{
    //
    protected $fillable = [
        'id', 'user_id', 'firstName', 'middleName', 'surnameId', 'birthDate', 'gender', 'married', 'phone', 'email', 'website', 'homeTown', 'education', 'occupation', 'about', 'thoughts', 'addressId', 'relationSelect', 'relationCreated'
    ];

    public static $validateData = [
    	'firstName' 		=> 'required',
    	'middleName' 		=> 'required',
    	'surnameId' 		=> 'required',
    	'birthDate' 		=> 'required',
    	'gender' 			=> 'required',
    	'married' 			=> 'required'
    ];

    public static $validateTreeData = [
        'firstName'         => 'required',
        'middleName'        => 'required',
        'surnameId'         => 'required',
        'birthDate'         => 'required',
        'gender'            => 'required',
        'married'           => 'required',
        'relationSelect'    => 'required'
    ];


    public static function findByUserid($userId)
    {
        $profileObj = DB::table('userData')->where('user_id', $userId)->first();
        return $profileObj;
    }
    public static function findById($id)
    {
        $profileObj = DB::table('userData')->where('id', $id)->first();
        return $profileObj;
    }

    public static function getSingleColumnData($userId, $columnName){
        $profileObj = DB::table('userData')->where('user_id', $userId)->select($columnName)->first();
        return $profileObj;
    }

    public static function getTreeDetails($userId){
        $obj = DB::table('userData')
            ->where('user_id', $userId)
            ->get();
            
        return $obj;
    }

    public static function addProfile($data){
    	DB::table('userData')->insert([
            'user_id' 			=> $data['user_id'],
            'firstName' 		=> $data['firstName'],
            'middleName' 		=> $data['middleName'],
            'surnameId' 		=> $data['surnameId'],
            'birthDate' 		=> $data['birthDate'],
            'gender' 			=> $data['gender'],
            'married' 			=> $data['married'],
            'phone' 			=> $data['phone'],
            'email' 			=> $data['email'],
            'website' 			=> $data['website'],
            'homeTown' 			=> $data['homeTown'],
            'education' 		=> $data['education'],
            'occupation' 		=> $data['occupation'],
            'about' 			=> $data['about'],
            'thoughts' 			=> $data['thoughts'],
            'addressId' 		=> $data['addressId'],
            'relationSelect' 	=> $data['relationSelect'],
            'relationCreated' 	=> $data['relationCreated']
        ]);
    }

    public static function updateProfile($data){
        DB::table('userData')
            ->where([
                ['user_id', '=', $data['user_id']],
                ['id', '=', $data['id']]
            ])
            ->update([
                'firstName'         => $data['firstName'],
                'middleName'        => $data['middleName'],
                'surnameId'         => $data['surnameId'],
                'birthDate'         => $data['birthDate'],
                'gender'            => $data['gender'],
                'married'           => $data['married'],
                'phone'             => $data['phone'],
                'email'             => $data['email'],
                'website'           => $data['website'],
                'homeTown'          => $data['homeTown'],
                'education'         => $data['education'],
                'occupation'        => $data['occupation'],
                'about'             => $data['about'],
                'thoughts'          => $data['thoughts'],
                'relationSelect'    => $data['relationSelect']
            ]);

        $addressId = DB::table('userData')
            ->select('addressId')
            ->where('user_id', $data['user_id'])
            ->first();

        return $addressId;
    }

    public static function updateTreeProfile($data){
        DB::table('userData')
            ->where([
                ['user_id', '=', $data['user_id']],
                ['id', '=', $data['id']]
            ])
            ->update([
                'firstName'         => $data['firstName'],
                'middleName'        => $data['middleName'],
                'surnameId'         => $data['surnameId'],
                'birthDate'         => $data['birthDate'],
                'gender'            => $data['gender'],
                'married'           => $data['married'],
                'phone'             => $data['phone'],
                'email'             => $data['email'],
                'website'           => $data['website'],
                'homeTown'          => $data['homeTown'],
                'education'         => $data['education'],
                'occupation'        => $data['occupation'],
                'about'             => $data['about'],
                'thoughts'          => $data['thoughts'],
                'relationSelect'    => $data['relationSelect'],
                'relationCreated'   => $data['relationCreated']
            ]);
    }
}
