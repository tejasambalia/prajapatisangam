<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Relation extends Model 
{
    //
    protected $fillable = [
        'id', 'family_id', 'inserted_relationship_table'
    ];

    $table_name ='relation_created';

    public static function findById($id){
        $obj = DB::table('relation_created')
            ->where([
                ['id', '=', $id],
                ['active', '=', '1']
            ])
            ->first();
        return $obj;
    }

    public static function getSingleColumn($id, $column){
        $obj = DB::table('m_relation')
            ->select($column)
            ->where('id', $id)
            ->first();
        return $obj;
    }

    public static function get()
    {
        $obj = DB::table('m_relation')
            ->where('active', '1')
        	->select('id', 'name')
        	->get();        	
        
        return $obj;
    }
}