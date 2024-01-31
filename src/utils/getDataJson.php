<?php
header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Origin: https://appfordev.com");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Izinkan metode HTTP tertentu
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Izinkan header kustom yang mungkin digunakan dalam permintaan Anda
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");

class GetData
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

    public function handleFetchData()
    {
        $response = array();
        if ($this->conn) {
            $query = $this->sql;
            $result = mysqli_query($this->conn, $query);
            // var_dump($result); die;
            if ($result) {
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    foreach ($this->tableColumns as $column) {
                        $response[$i][$column] = $row[$column];
                    }
                    $i++;
                }
                return json_encode($response, JSON_PRETTY_PRINT);
            } else {
                return "Error";
            }
        }
    }
}
