<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class State extends Model 
{
    //
    protected $fillable = [
        'id', 'name'
    ];


    public static function get()
    {
        $surnameObj = DB::table('m_state')
        	->select('id', 'name')
        	->get();        	
        
        return $surnameObj;
    }
}