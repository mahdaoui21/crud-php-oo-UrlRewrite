<?php

require_once"sid/UserManager/UserManager.php";


$userM =  new UserManager(new PDO("mysql:host=localhost;dbname=users", "root", ""));
if(isset($_GET['do'])){
    $action=$_GET['do'];
    switch($action){
        case 'add':{
            if(isset($_POST['username']) && isset($_POST['password'])){
                $username=$_POST['username'];
                $password=$_POST['password'];
                $userM->addUser($username,$password);
            }
            break;
        }
        case 'delete': {
            if(isset($_GET['id']))
            $userM->deleteUser($_GET['id']);
            break;
        }
        case 'update':{
            if(isset($_GET['id'])){
                $u=$userM->getUser($_GET['id']);
                $update=true;
            }
            if(isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password'])){
                $userM->updateUser($_POST['id'],$_POST['username'],$_POST['password']);
            }
        }
    }
}
$users=$userM->getAllUsers();