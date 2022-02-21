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
____
# getAll
Метод getAll - возвращает массив со всеми данными из таблицы $table.
```php
$users = $db->getAll(string $table)): array; 
```
**пример:**
```php
$users = $db->getAll('users');
```
возвращает массив 
```php
array(2) {
  [0]=>
  array(4) {
    ["id"]=>
    string(1) "1"
    ["name"]=>
    string(3) "Nik"
    ["surname"]=>
    string(5) "Bykov"
    ["handle"]=>
    string(10) "nickbykov2"
  }
  [1]=>
  array(4) {
    ["id"]=>
    string(1) "3"
    ["name"]=>
    string(4) "Alex"
    ["surname"]=>
    string(5) "Bykov"
    ["handle"]=>
    string(10) "alexbykov2"
  }
}
```
# getOne

Метод getOne - возвращает массив одной записи (одного пользователя) из таблицы $table.
```php
$user = $db->getOne(string $table,string $id): array; 
```
**пример:**
```php
$users = $db->getOne('users', 1);
```
возвращает массив 
```php
array(1) {
  [0]=>
  array(4) {
    ["id"]=>
    string(1) "1"
    ["name"]=>
    string(3) "Nik"
    ["surname"]=>
    string(5) "Bykov"
    ["handle"]=>
    string(10) "nickbykov2"
  }
}
```

# create

Метод  create создает запись в таблице $table.

```php
$db->create(string $table,array $data): bool;
```
**пример:**
```php
$db->create('users', 
[
    'name' => 'Alex',
    'surname' => 'Bykov']);
```


# update

Меток update меняет данные в таблице users, данные получается из массива $data и выбранной строке по $id.
```php
$db->update(string $table, array $data, string $id): bool;
```
**пример:**
```php
$db->update('users', 
[
    'name' => 'Ivan',
    'surname' => 'Bykov']), 1;
```

# deleteOne

Метод delete удаляет строку по $id из таблицы users.
```php
$db->deleteOne(string $table, string $id): bool;
```
**пример:**
```php
$db->deleteOne('users', 1);
```
Удаляет строку с id = 1






