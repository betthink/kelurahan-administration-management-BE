<?php 
class GetData {
    private $conn;
    private $tableColumns;
    private $sql;
    public function __construct($db, $columns, $query) {
        $this->conn = $db;
        $this->sql = $query;
        $this->tableColumns =$columns;

    }

    public function handleFetchData() {
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
