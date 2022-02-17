<?php
class QueryBuilder{

    /** 
    * конструктор принимает объект $pdo и присваевает  
    * 
    */
    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    /** 
    * string $table - название таблицы
    * возвращает массив
    */
    public function getAll($table){

        $sql = "SELECT * FROM {$table}}";
        $stm = $this->pdo->prepare($sql);
        $stm->execute();

        $getAll = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $getAll;        
    }
    /** 
    * string $table - название таблицы
    * array $data - получаем из $_POST
    * записывает данные в таблицу $table
    */
    public function create($table, $data){
        
        $keys = implode(',', array_keys($data));
        $tags = ":" . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";
        //dd($sql);
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }
    /** 
    * string $table - название таблицы
    * string $id - id строки в таблицы $table 
    * возвращает массив одной строки из таблицы $table
    */
    public function getOne($table, $id){
        $sql = "SELECT * FROM {$table} WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    /** 
    * string $table - название таблицы
    * array $data - получаем из $_POST
    * string $id - id строки в таблицы $table 
    * выполняет изменения в таблице $table в строке $id
    */
    public function update($table, $data, $id){
        $keys = array_keys($data);
        $string = '';
        foreach ($keys as $key){
            $string .= $key . '=:' . $key . ',';
        }
        $keys = rtrim($string, ',');

        $data['id'] = $id;
        $sql = "UPDATE {$table} SET {$keys} WHERE id=:id;";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
        
    }
    /** 
    * string $table - название таблицы
    * array $data - получаем из $_POST
    * string $id - id строки в таблицы $table 
    * удаляет одну выбранную строку в таблице $table 
    */
    function deleteOne($table, $id){
        $sql = "DELETE from {$table} WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}

?>