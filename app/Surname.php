<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Surname extends Model 
{
    //
    protected $fillable = [
        'id', 'name'
    ];

    public static function findById($id)
    {
        $surnameObj = DB::table('m_surname')->where('id', $id)->first();
        return $surnameObj;
    }

    public static function getSingleColumn($id, $column){
        $surnameObj = DB::table('m_surname')
            ->select($column)
            ->where('id', $id)
            ->first();
        return $surnameObj;
    }

    public static function get()
    {
        $surnameObj = DB::table('m_surname')
        	->select('id', 'name')
        	->get();        	
        
        return $surnameObj;
    }
}