<?php 
namespace Controller;
use Model\userModel;

Class userController {
    function signup ($jsonObject) {
        $user = new userModel ();

        $data = json_decode ($jsonObject , true);

        if ($data ["userName"] != null && $data ["userPassword"] != null && $data ["userEmail"] != null) {
            if (strlen ($data ["userName"]) > 3 && strlen ($data ["userPassword"]) >= 8 && strlen ($data ["userEmail"]) >= 8) {
                $result = $user -> signup ($data ["userName"] , $data ["userPassword"] , $data ["userEmail"]);

                if (isset ($result [0])) {
                    $data = [
                        "response" => "user created successfully"
                    ];
    
                    return json_encode ($data);
                }
            } else {
                $data = [
                    "response" => "some credential is empty or smaller than minimu limit"
                ];
    
                return json_encode ($data);
            }
        } else {
            $data = [
                "response" => "some credential is null"
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

    function deleteUser ($jsonObject) {
        $user = new userModel ();

        $data = json_decode ($jsonObject , true);

        if (isset ($data ["userEmail"])) {
            $user -> deleteuser ($data ["userEmail"]);
            return 1;
        } else {
            return 0;
        }

    }
}
?>