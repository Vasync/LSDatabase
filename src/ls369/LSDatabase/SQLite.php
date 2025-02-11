<?php

declare(strict_types=1);

namespace ls369\LSDatabase;

use SQLite3;

class SQLite extends SQLite3 {
    
    
    public function createTable(string $name, array $columns): self {
        $columnsStr = implode(", ", array_map(fn($col) => "$col TEXT", $columns));
        $query = "CREATE TABLE IF NOT EXISTS $name ($columnsStr);";
        
        $this->exec($query);
        
        return $this;
    }

    public function removeTable(string $name): void {
        $query = "DROP TABLE IF EXISTS $name";
        
        $this->exec($query);
    }

    public function existsTable(string $name): bool {
        $query = "SELECT name FROM sqlite_master WHERE type='table' AND name=$name;";
        
        $result = $this->exec($query);

        if ($result == $name) return true;
        return false;
    }
    
    public function set(string $table, string $k, string $v): void {
        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_map(fn($value) => "'" . SQLite3::escapeString($value) . "'", array_values($data)));
        $query = "UPDATE $table SET $k = $v;";
            $this->exec($query);
        }
    
    public function get(string $table, array $columns, string $condition = ''): array {
        $columnsStr = implode(", ", $columns);
        $query = "SELECT $columnsStr FROM $table" . ($condition ? " WHERE $condition" : "");
        $result = $this->query($query);
        
        $rows = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $rows[] = $row;
        }
    
        return $rows;
    }
    
    public function add(string $table, string $column, string $type = 'TEXT'): void {
        $query = "ALTER TABLE $table ADD COLUMN $column $type";
        $this->exec($query);
    }

    public function remove(string $table, string $column, string $type = 'TEXT'): void {
        $query = "ALTER TABLE $table DROP COLUMN $column $type";
        $this->exec($query);
    }
    
}
