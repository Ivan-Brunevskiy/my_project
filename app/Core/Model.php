<?php


namespace App\Core;


class Model
{
    protected static $tablename;

    public static function finById($id){
        $sql = "SELECT * FROM ".(static::$tablename)." WHERE id = ".$id;
        $res = DB::getConnection()->query($sql);
        return $res->fetch_object(static::class);

    }

    public static function search($searchArgs = [], $offset=0, $limit =100){
        $sql = "SELECT * FROM ".(static::$tablename);
        $res = DB::getConnection()->query($sql);
        $array = [];

        while ($obj = $res->fetch_object(static::class)){
            $array[] = $obj;
        }
        return $array;
    }

    public function save(){}
}
