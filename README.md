# QueryBuilder
Простой компонент для работы с базой. Выполняется команды CRUD операция (CREATE, SELECT ,UPGRADE, DELETE)

Указываем настройки для подключение к базе: server, database, charset, login, password.

```php
$config = include 'config.php';
```

Устаналивается соедение с базой и возвращает объект PDO
```php
include 'database/Connection.php';
```
Подключаем QueryBuilder 
```php
include 'database/QueryBuilder.php';
```
Создаем класс
```php
$db = new QueryBuilder(Connection::make($config['database']));
```
# getAll
Метод getAll - возвращает массив со всеми данными из таблицы users.
```php
$users = $db->getAll('users'); 
```
# getOne

Метод getOne - возвращает массив одной записи (одного пользователя) из таблицы users.
```php
$user = $db->getOne('users', $id); 
//$id получаем из $_GET;
```
# create

Метод  create создает запись в таблице 'users'.

```php
$db->create('users', $data)
// $data получаем из $_POST;
```

# update

Меток update меняет данные в таблице users, данные получается из массива $data и выбранной строке по $id.
```php
$db->update('users', '$data', $id);
// $data получаем из $_POST;
// $id получаем из $_GET;
```

# deleteOne

Метод delete удаляет строку по $id из таблицы users.
```php
$db->deleteOne('users', $id);
// $id получаем из $_GET;
```






