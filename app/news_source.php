<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class news_source extends Model 
{
    //
    protected $fillable = [
        'id', 'link', 'site', 'type'
    ];

    public static function findById($id){
        $obj = DB::table('news_source')
            ->where([
                ['id', '=', $id]
            ])
            ->first();
        return $obj;
    }

    public static function getSingleColumn($id, $column){
        $obj = DB::table('news_source')
            ->select($column)
            ->first();
        return $obj;
    }

    public static function get(){
        $obj = DB::table('news_source')
        	->select('id', 'link', 'site', 'type')
        	->get();        	
        
        return $obj;
    }
}