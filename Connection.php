<?php
class Connection{

    /** 
    * массив $config с данными для подключения к базе
    * возврщает объект $pdo
    */
    public static function make($config){
        $pdo = new PDO("{$config['connection']};
        dbname={$config['database']};
        charset={$config['charset']};", 
        "{$config['username']}", 
        "{$config['passwword']}", 
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        return $pdo;
    }
}
?>