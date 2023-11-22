<?php 
namespace ModelTests;
require ("vendor/autoload.php");
use Model\userModel;
use PHPUnit\Framework\TestCase;

Class userModelTests extends TestCase {

    function shouldAcceptSignup () {
        $data = [
            "caso 1" => ["user" , "12345678" , "user@email.com"],
            "caso 2" => ["popopopo" , "123456789123456789" , "users@email.com"]
        ];

        return $data;
    }

    function shouldRefuseSignup () {
        $data = [
            "empty name" => ["" , "12345678" , "users@email.com"],
            "empty password" => ["popopopo" , "" , "userss@email.com"],
            "empty email" => ["popopopo" , "" , "usersss@email.com"],
            "null name" => [NULL , "" , "user@email.com"],
            "null password" => ["popopopo" , NULL , "usersssss@email.com"],
            "null email" => ["popopopo" , "12345678" , NULL]
        ];

        return $data;
    }

    function shouldRefuseLogin () {
        $data = [
            "empty password" => ["user" , "12345678" , "user@email.com" , "user@email.com" , ""],
            "empty email" => ["popopopo" , "123456789123456789" , "users@email.com" , "" , "123456789123456789"],
            "null password" => ["user" , "12345678" , "user@email.com" , "user@email.com" ,NULL],
            "null email" => ["popopopo" , "123456789123456789" , "users@email.com" , NULL , "123456789123456789"]
        ];

        return $data;
    }

    /**  
    * @dataProvider shouldAcceptSignup
    */
    function testShouldAcceptSignup ($userName , $userPassword , $userEmail) {

        $user = new userModel ();

        $result = $user -> signup ($userName , $userPassword , $userEmail);
        $this -> assertSame (true , isset ($result [0]));
        $user -> deleteUser ($userEmail);
    }

    /** 
     * @dataProvider shouldRefuseSignup
    */
    function testShouldRefuseSignup ($userName , $userPassword , $userEmail) {

        $user = new userModel ();

        $result = $user -> signup ($userName , $userPassword , $userEmail);
        $this -> assertSame (false , isset ($result [0]));
        $user -> deleteUser ($userEmail); 
    }

    /**
     * @dataProvider shouldAcceptSignup
     */
    function testShouldAcceptLogin ($userName , $userPassword , $userEmail) {
        $user = new userModel ();

        $user -> signup ($userName , $userPassword , $userEmail);
        $result = $user -> login ($userEmail , $userPassword);
        $this -> assertSame (true , isset ($result [0]));
        $user -> deleteUser ($userEmail);
    }

    /**
     * @dataProvider shouldRefuseLogin
     */
    function testShouldRefuseLogin ($userName , $userPassword , $userEmail , $email , $password) {
        $user = new userModel ();

        $user -> signup ($userName , $userPassword , $userEmail);
        $result = $user -> login ($email , $password);
        $this -> assertSame (false , isset ($result [0]));
        $user -> deleteUser ($userEmail);
    }

    /**
     * @dataProvider shouldAcceptSignup
     */
    function testShouldDeleteUser ($userName , $userPassword , $userEmail) {
        $user = new userModel ();

        $user -> signup ($userName , $userPassword , $userEmail);
        $result = $user -> deleteUser ($userEmail);
        $this -> assertSame (true , isset ($result [0]));
    }

}

?>