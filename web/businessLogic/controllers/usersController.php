<?php
error_reporting(E_ALL); (including to list all errors) 
require "baseController.php";
require __DIR__ . "/../entities/user.php"; ( based on root )

class userController extends baseController { inherits base controlers
   /**
    * This method is used to construct an instance of a user entity from the given table row supplied
    * @param $row Table row from which we build user entity
    */
    private function construct($row){ 
        $obj = new user(); napravili smo novu instancu user entiteta
        $obj->userId = $row["userId"]; take the value from the row and assign that value to the entity property 
        $obj->username = $row["username"];
        $obj->password = "";
        return $obj;
    }
   /**
    * Retrieve a user from the supplied username and password. If no user exists a no result.
    * @param $username Username of the user requested
    * @param $password Password of the user requested
    */
    public function getByUsernamePassword ($username, $password){

        $result = $this->getData("users_getByUsernamePassword", array(
            "username"    => $username, array of key value pair 
            "password"    => $password
        ));
        
        if($result){
            while ($row = $result->fetch_assoc()) { ugradjena mysql funkcija koja vraca red po red. 
                return $this->construct($row);
            }
        }
        return null;
    }
}
?>