<?php 
namespace Model;
use Database\connection;
use PDO;

class userModel {
    function signup ($userName , $userPassword , $userEmail) {
        $db = new connection ();
        $query = "INSERT INTO USERS (userName, userPassword, userEmail) 
        VALUES ('$userName', '$userPassword', '$userEmail');";

        return $db -> connectInDb () -> query ($query) -> fetchAll (PDO::FETCH_ASSOC);
    }
}
?>