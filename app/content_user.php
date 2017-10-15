<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class content_user extends Model 
{
    //
    protected $fillable = [
        'id', 'title', 'description', 'url', 'description', 'image_link', 'view_count', 'like_count', 'audit_created_date', 'audit_created_by'
    ];

    public static function findById($id){
        $obj = DB::table('content_user')
            ->where([
                ['id', '=', $id]
            ])
            ->first();
        return $obj;
    }

    public static function getSingleColumn($id, $column){
        $obj = DB::table('content_user')
            ->select($column)
            ->first();
        return $obj;
    }

    public static function get(){
        $obj = DB::table('content_user')
        	->select('id', 'title', 'description', 'image_link', 'view_count', 'like_count', 'audit_created_date', 'audit_created_by')
            ->orderBy('audit_created_date', 'desc')
        	->get();        	
        
        return $obj;
    }

    public static function insert($data){
        $obj = DB::table('content_user')
            ->insert([
                'title' => $data['title'],
                'description' => $data['description'],
                'image_link' => $data['image_link'],
                'view_count' => '0',
                'like_count' => '0',
                'audit_created_date' => date('Y-m-d H:i:s'),
                'audit_created_by' => \Auth::user()->id,
                'audit_ip' => Request::ip()
            ]);
    }
}