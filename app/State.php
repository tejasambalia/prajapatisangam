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

    public static function findById($id){
        $obj = DB::table('m_state')->where('id', $id)->first();
        return $obj;
    }

    public static function getSingleColumn($id, $column){
        $obj = DB::table('m_state')
            ->select($column)
            ->where('id', $id)
            ->first();
        return $obj;
    }

    public static function get()
    {
        $surnameObj = DB::table('m_state')
        	->select('id', 'name')
            ->orderBy('name', 'asc')
        	->get();        	
        
        return $surnameObj;
    }
}