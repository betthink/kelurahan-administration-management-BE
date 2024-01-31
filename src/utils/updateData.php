<?php
header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Origin: https://appfordev.com");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Izinkan metode HTTP tertentu
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Izinkan header kustom yang mungkin digunakan dalam permintaan Anda
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");
class UpdateData
{

    private $conn;
    private $query;
    private $message_succes;
    private $message_failed;


    public function __construct($conn, $query, $message_succes, $message_failed)
    {

        $this->conn = $conn;
        $this->query = $query;
        $this->message_succes = $message_succes;
        $this->message_failed = $message_failed;
    }


    public function handleUpdateData()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $response = array();
            if (mysqli_query($this->conn, $this->query)) {
                $response['value'] = 1;
                $response['message'] =  $this->message_succes;
                echo json_encode($response);
            } else {
                $response['value'] = 0;
                $response['message'] =  $this->message_failed;
                echo json_encode($response);
            }
        }
    }
}
