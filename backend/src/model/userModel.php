<?php 
namespace Model;
use Database\connection;
use PDO;

Class userModel {
    function signup ($userName , $userPassword , $userEmail) {
        $db = new connection ();

        if (strlen ($userName) > 3 && strlen ($userPassword) >= 8 && strlen ($userEmail) >= 8) {
            if ($userName != null && $userPassword != null && $userEmail != null) {
                $queryOne = "SELECT * FROM USERS WHERE useremail = '$userEmail';";
                $result = $db -> connect () -> query ($queryOne) -> fetchAll (PDO::FETCH_ASSOC);
    
                if (!isset ($result [0])) {
                    $query = "INSERT INTO USERS (userName, userPassword, userEmail) 
                    VALUES ('$userName', '$userPassword', '$userEmail');";
                    return $db -> connect () -> query ($query) -> fetchAll (PDO::FETCH_ASSOC);
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    function login ($userEmail , $userPassword) {

        $db = new connection ();

        if (strlen ($userEmail) >= 8 && strlen ($userPassword) >= 8) {
            if ($userEmail != null && $userPassword != null) {
                $query = "SELECT * FROM USERS
                WHERE userEmail = '$userEmail' and userPassword = '$userPassword';";
        
                return $db -> connect () -> query ($query) -> fetchAll (PDO::FETCH_ASSOC);
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    function deleteUser ($userEmail) {
        
        if (strlen ($userEmail) >= 8) {
            $db = new connection ();
            $query = "DELETE FROM USERS
            WHERE userEmail = '$userEmail';";

            return $db -> connect () -> query ($query) -> fetchAll (PDO::FETCH_ASSOC);
        }
        return 0;
    }
}
?>