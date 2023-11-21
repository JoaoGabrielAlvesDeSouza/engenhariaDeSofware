<?php 

require ("vendor/autoload.php");
use Database\migrations;

$db = new migrations ();

$db -> buildDb ();

header ("Content-Type: application/json");

$method = $_SERVER ["REQUEST_METHOD"];
$url = $_SERVER ["REQUEST_URI"];

if ($method == "POST") {
    switch ($url) {
        case "/signup" :
            $user = new Controller\userController ();

            $response = $user -> signup (file_get_contents ("php://input"));
            echo ($response);
            break;
            case "/login" :
                $user = new Controller\userController ();
    
                $response = $user -> login (file_get_contents ("php://input"));
                echo ($response);
                break;
        default :
            $response = [
                "status" => "404",
                "message" => "route dont exists"
            ];

            header ("HTTP/1.1 404 Route Not Found");
            echo (json_encode ($response));
    }
} else {
    $response = [
        "status" => "405",
        "message" => "$method Not Allowed"
    ];

    header ("HTTP/1.1 405 Method Not Allowed");
    echo (json_encode ($response));
}

?>