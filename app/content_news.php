<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class content_news extends Model 
{
    //
    protected $fillable = [
        'id', 'title', 'image_link', 'url', 'description', 'author', 'source', 'view_count', 'like_count', 'audit_created_date'
    ];

    public static function findById($id){
        $obj = DB::table('content_news')
            ->where([
                ['id', '=', $id]
            ])
            ->first();
        return $obj;
    }

    public static function getSingleColumn($id, $column){
        $obj = DB::table('content_news')
            ->select($column)
            ->first();
        return $obj;
    }

    public static function get(){
        $obj = DB::table('content_news')
        	->select('id', 'title', 'image_link', 'url', 'description', 'author', 'source', 'view_count', 'like_count', 'audit_created_date')
            ->orderBy('audit_created_date', 'desc')
        	->get();        	
        
        return $obj;
    }

    public static function insert($data){
        $obj = DB::table('content_news')
            ->insert([
                'title' => $data['title'],
                'image_link' => $data['image_link'],
                'url' => $data['url'],
                'description' => $data['description'],
                'author' => $data['author'],
                'source' => $data['source'],
                'audit_created_date' => date('Y-m-d H:i:s')
            ]);
    }
}