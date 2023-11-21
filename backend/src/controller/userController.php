<?php 
namespace Controller;
use Model\userModel;

Class userController {
    function signup ($jsonObject) {
        $user = new userModel ();

        $data = json_decode ($jsonObject , true);

        if (isset ($data ["userName"]) && isset ($data ["userPassword"]) && isset ($data ["userEmail"])) {
            $result = $user -> signup ($data ["userName"] , $data ["userPassword"] , $data ["userEmail"]);

            if (isset ($result [0])) {
                $data = [
                    "response" => "user created successfully"
                ];

                return json_encode ($data);
            }
        } else {
            $data = [
                "response" => "credentials invalid or null"
            ];

            return json_encode ($data);
        }

    }

    function login ($jsonObject) {
        $user = new userModel ();

        $data = json_decode ($jsonObject , true);

        if (isset ($data ["userPassword"]) && isset ($data ["userEmail"])) {
            $result = $user -> login ($data ["userEmail"] , $data ["userPassword"]);

            if (isset ($result [0])) {
                $data = [
                    "name" => $result [0] ["username"],
                    "email" => $result [0] ["useremail"],
                    "password" => $result [0] ["userpassword"]
                ];

                return json_encode ($data);
            }
        } else {
            $data = [
                "response" => "credentials invalid, null or user dont exists"
            ];

            return json_encode ($data);
        }

    }
}
?>