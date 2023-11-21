<?php 
namespace Database;
use PDO;

Class connection {
    function connect () {
        $host = getenv ("HOST");
        $dbName = getenv ("DBNAME");
        $userName = getenv ("USERNAME");
        $password = getenv ("PASSWORD");
        $port = getenv ("DBPORT");

        return new PDO ("pgsql:host=$host; port=$port; dbname=$dbName" , $userName , $password);
    }

    function connectInDb () {
        $db = new connection ();

        $result = $db -> connect () -> query ("SELECT EXISTS (SELECT * FROM USERS);") -> fetchAll (PDO::FETCH_ASSOC);

        if ($result [0] != True) {
            $createTable = "CREATE TABLE USERS (
                userId SERIAL PRIMARY KEY,
                userName VARCHAR (50),
                userPassword VARCHAR (50),
                userEmail VARCHAR (50)
            );";
    
            $result = $db -> connect () -> query ($createTable) -> fetchAll (PDO::FETCH_ASSOC);
    
            if (isset ($result [0])) {
                return $db;
            } else {
                return 0;
            }
        }

        return $db;

    }
}
?>