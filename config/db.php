<?php
    class Database{
        public static function connect(){
            $db = new mysqli('localhost', 'root', '', 'store_online');
            $db->query("SET NAMES 'utf8'");
            return $db;
        }
    }
?>