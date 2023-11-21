<?php 

namespace Database;
require ("vendor/autoload.php");
use Database\connection;
use PDO;

Class migrations {
    function buildDb () {
        $db = new connection ();
        $query = "SELECT EXISTS 
        (SELECT FROM pg_tables 
        WHERE schemaname='public' 
        AND tablename='users');";

        $result = $db -> connect () -> query ($query) -> fetchAll (PDO::FETCH_ASSOC);

        if ($result [0] ["exists"] == false) {
            $createTable = "CREATE TABLE USERS (
                userId SERIAL PRIMARY KEY,
                userName VARCHAR (50) NOT NULL,
                userPassword VARCHAR (50) NOT NULL,
                userEmail VARCHAR (50) NOT NULL
            );";
    
            $result = $db -> connect () -> query ($createTable) -> fetchAll (PDO::FETCH_ASSOC);
    
            if (isset ($result [0])) {
                return 1;
            } else {
                return 0;
            }
        }

    }
}

?>