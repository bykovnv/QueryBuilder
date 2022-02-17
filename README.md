# QueryBuilder
Простой компонент для работы с базой. Выполняется команды CRUD операция (CREATE, SELECT ,UPGRADE, DELETE)

Указываем настройки для подключение к базе: server, database, charset, login, password.

```
$config = include 'config.php';
```

Устаналивается соедение с базой и возвращает объект PDO
```
include 'database/Connection.php';
```
Подключаем QueryBuilder 
```
include 'database/QueryBuilder.php';
```
Создаем класс
```
$db = new QueryBuilder(Connection::make($config['database']));
```
# getAll
Метод getAll - возвращает массив со всеми данными из таблицы users.
```
$users = $db->getAll('users'); 
```
# getOne

Метод getOne - возвращает массив одной записи (одного пользователя) из таблицы users.
```
$user = $db->getOne('users', $id); 
//$id получаем из $_GET;
```
# update

Меток update меняет данные в таблице users, данные получается из массива $data и выбранной строке по $id.
```
$db->update('users', '$data', $id);
// $data получаем из $_POST;
// $id получаем из $_GET;
```

# deleteOne

Метод delete удаляет строку по $id из таблицы users.
```
$db->deleteOne('users', $id);
// $id получаем из $_GET;
```






