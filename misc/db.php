<?php
namespace misc;

/**
 * Class for connection to database
 */
class Database
{
    protected $connection = false;

    protected function __construct($config)
    {
        if (!$this->connection) {
            // connect to database
            $this->connection = mysqli_connect(
                $config['host'],
                $config['login'],
                $config['password'],
                $config['dbname'],
                $config['port']
            );
        }
        return $this->connection;
    }

    public static function connect($config = false)
    {
        return new Database($config);
    }

    public function query($query = '')
    {
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function tables()
    {
        $tables = mysqli_query($this->connection, 'SHOW TABLES');
        return mysqli_fetch_all($tables);
    }

    public function delete($table, $col, $value)
    {
        $value = mysqli_real_escape_string($this->connection, $value);
        $q = "DELETE FROM `$table` WHERE `$col` = '$value'";
        mysqli_query($this->connection, $q);
        return true;
    }

    public function insert($table, $cols, $values)
    {
        $ordered_vals = [];
        foreach ($cols as $col) {
            if (!is_null ($values[$col])) {
                $ordered_vals[] = '\'' . mysqli_real_escape_string($this->connection, $values[$col]) . '\'';
            } else {
                $ordered_vals[] = 'NULL';
            }
        }

        $q = "INSERT INTO $table (" . implode(',', $cols) . ") VALUES (" . implode(',', $ordered_vals) . ")";
        mysqli_query($this->connection, $q);
        return mysqli_insert_id($this->connection);
    }

    public function find($table, $value, $col = 'id')
    {
        $value = mysqli_real_escape_string($this->connection, $value);
        $q = "SELECT * FROM `$table` WHERE `$col` = '$value' LIMIT 1";
        $row = mysqli_query($this->connection, $q);
        return mysqli_fetch_assoc($row);
    }
}