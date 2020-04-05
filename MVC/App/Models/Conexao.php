<?php 

namespace App\Models;


abstract class Conexao {
    private static $conn;


    public static function getConnection(){
        try {
            //code...

            self::$conn = new \PDO("mysql:host=localhost;dbname=lojavip","root","",$option = [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_CASE => \PDO::CASE_NATURAL
            ]);
            return self::$conn; // retornando a variavel com a conexao;
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }


}