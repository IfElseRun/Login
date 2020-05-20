<?php
error_reporting(E_ALL);

require __DIR__ . "/../businessLogic/controllers/usersController.php";

$action = $_GET["action"];

switch($action){
    case "login":
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $controller = new userController();
        $loggedOnUser = $controller->getByUsernamePassword($username, $password);

        if($loggedOnUser != null){
            echo json_encode($loggedOnUser);
        } else {
            http_response_code(404);
        }
    }
    break;
    default:
        http_response_code(405);
    break;
}
?>