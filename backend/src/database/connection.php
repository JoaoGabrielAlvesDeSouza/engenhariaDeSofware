<?php 
namespace Database;
use PDO;
use Symfony\Component\Dotenv\Dotenv;

Class connection {
    function connect () {

        $env = new Dotenv ();
        $env -> load (__DIR__."/../../.env");

        $host = $_ENV ["DBHOST"];
        $dbName = $_ENV ["DBNAME"];
        $userName = $_ENV ["DBUSERNAME"];
        $password = $_ENV ["DBPASSWORD"];
        $port = $_ENV ["DBPORT"];

        return new PDO ("pgsql:host=$host;port=$port;dbname=$dbName" , $userName , $password);
    }
}
?>