<?php
require_once __DIR__ . "/../../config/header.php";
class AuthLogin
{
    private $conn;
    private $tableColumns;
    private $sql;

    public function __construct($db, $columns, $query)
    {
        $this->conn = $db;
        $this->sql = $query;
        $this->tableColumns = $columns;
    }

    public function handleAuthData()
    {
        $response = array();
        if ($this->conn) {
            $query = $this->sql;
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                $data = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $item = array();
                    foreach ($this->tableColumns as $column) {
                        $item[$column] = $row[$column];
                    }
                    $data[] = $item;
                }

                $response['data'] = $data;
            }

            return json_encode($response, JSON_PRETTY_PRINT);
        }
    }
}
