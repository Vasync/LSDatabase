# 💾LSDatabase
<img alt="feature" src="https://img.shields.io/badge/feature-database-aqua"><img alt="approval" src="https://img.shields.io/badge/data_management-blue"><br>
Easier database for PocketMine-MP.

<a href="https://github.com/search?q=LootSpace369%2FLSDatabase&type=code">Plugins use it</a>

## ❓What is it?
- Better database.
- Exchanging data between files will be easier.
- Exchanges are no longer interrupted
- Better SQL support

## ✍️Using:
### How to create a database:
```PHP
use ls369\LSDatabase\SQLite;

//...

$db = new SQLite($this->plugin->getDataFolder() . 'players.db', SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);

$db->createTable("user", ["kienmc","pvmn"]);

// set the names in the user table
$db->set("user", ["kienmc" => "dutube", "pvmn" => "lacdit"]);


// add column to user table
$db->add('user', 'money', 'INTEGER');

// get data
$users = $db->get('users', ['kienmc', 'pvmn', 'money']);
// output: "dutube", "lacdit", "0";

```
