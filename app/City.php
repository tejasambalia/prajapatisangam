<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class City extends Model 
{
    //
    protected $fillable = [
        'id', 'name'
    ];

    public static function findById($id){
        $obj = DB::table('m_city')->where('id', $id)->first();
        return $obj;
    }

    public static function getSingleColumn($id, $column){
        $obj = DB::table('m_city')
            ->select($column)
            ->where('id', $id)
            ->first();
        return $obj;
    }

    public static function get()
    {
        $surnameObj = DB::table('m_city')
        	->select('id', 'name')
        	->get();        	
        
        return $surnameObj;
    }
}