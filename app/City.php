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


    public static function get()
    {
        $surnameObj = DB::table('m_city')
        	->select('id', 'name')
        	->get();        	
        
        return $surnameObj;
    }
}