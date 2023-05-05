<?php 

class Db{
    public static function connect(){
        $db = new mysqli("localhost","root","admin","vimuble");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
