<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class content_video extends Model 
{
    //
    protected $fillable = [
        'id', 'title', 'type', 'link', 'view_count', 'like_count', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip', 'description', 'img_link'
    ];

    public static function findById($id){
        $obj = DB::table('content_video')
            ->where([
                ['id', '=', $id]
            ])
            ->first();
        return $obj;
    }

    public static function getSingleColumn($id, $column){
        $obj = DB::table('content_video')
            ->select($column)
            ->where('id', $id)
            ->first();
        return $obj;
    }

    public static function get(){
        $obj = DB::table('content_video')
        	->select('id', 'title', 'type', 'link', 'view_count', 'like_count', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip', 'description', 'img_link')
            ->orderBy('audit_created_date', 'desc')
        	->get();
        return $obj;
    }
}