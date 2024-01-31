<?php
header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Origin: https://appfordev.com");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Izinkan metode HTTP tertentu
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Izinkan header kustom yang mungkin digunakan dalam permintaan Anda
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");
class DeleteData
{

    private $conn;
    private $query;
    private $succes_mes;
    private $failed_mes;
    public function __construct($conn, $query, $succes_mes, $failed_mes)
    {
        $this->conn = $conn;
        $this->query = $query;
        $this->succes_mes = $succes_mes;
        $this->failed_mes = $failed_mes;
    }

    public function handleDeleteData()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $response = array();
            if (mysqli_query($this->conn, $this->query)) {
                # code...
                $response['value'] = 1;
                $response['message'] = $this->succes_mes;
                echo json_encode($response);
            } else {
                # code...
                $response['value'] = 0;
                $response['message'] = $this->failed_mes;
                echo json_encode($response);
            }
        }
    }
}
