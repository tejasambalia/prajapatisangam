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


    public static function get()
    {
        $surnameObj = DB::table('m_surname')
        	->select('id', 'name')
        	->get();        	
        
        return $surnameObj;
    }
}