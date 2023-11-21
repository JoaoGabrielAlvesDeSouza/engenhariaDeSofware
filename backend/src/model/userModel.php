<?php 
namespace Model;
use Database\connection;
use PDO;

Class userModel {
    function signup ($userName , $userPassword , $userEmail) {
        $db = new connection ();
        $query = "INSERT INTO USERS (userName, userPassword, userEmail) 
        VALUES ('$userName', '$userPassword', '$userEmail');";

        return $db -> connect () -> query ($query) -> fetchAll (PDO::FETCH_ASSOC);
    }

    function login ($userEmail , $userPassword) {
        $db = new connection ();
        $query = "SELECT * FROM USERS
        WHERE userEmail = '$userEmail' and userPassword = '$userPassword';";

        return $db -> connect () -> query ($query) -> fetchAll (PDO::FETCH_ASSOC);
    }
}
?>