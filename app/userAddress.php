<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserAddress extends Model 
{
    //
    protected $fillable = [
        'id', 'address', 'cityId', 'stateId', 'pincode'
    ];


    public static function findById($id)
    {
        $addressObj = DB::table('userAddress')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('userAddress')->where('id', $addressId)->select($columnName)->first();
    }

    public static function add($data){
    	DB::table('userAddress')->insert([
            'address'           => $data['address'],
            'cityId' 		    => $data['city'],
            'stateId' 		    => $data['state'],
            'pincode' 		    => $data['Pincode']
        ]);

        $addressId = DB::table('userAddress')
            ->max('id');

        return $addressId;
    }

    public static function updateAddress($data){
        DB::table('userAddress')
            ->where('id', $data['addressId'])
            ->update([
                'address'           => $data['address'],
                'cityId'            => $data['city'],
                'stateId'           => $data['state'],
                'pincode'           => $data['Pincode']
            ]);
    }
}
