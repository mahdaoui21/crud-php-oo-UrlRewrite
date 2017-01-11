<?php
/**
 * Created by PhpStorm.
 * User: Abdessamad
 * Date: 10-01-17
 * Time: 16:42
 */




class UserManager {

    private $PDO;
    function __construct(\PDO $PDO){
        $this->PDO=$PDO;
    }

    function  addUser($username,$password){

        $stmt=$this->PDO->prepare("insert into users(username,password) values(?,?)");
        $stmt->bindValue(1,$username,PDO::PARAM_STR);
        $stmt->bindValue(2,$password,PDO::PARAM_STR);
        $stmt->execute();

    }

    function updateUser($id,$username,$password){
        $stmt=$this->PDO->prepare("update users set username=?,password=? where id=?");
        $stmt->bindValue(1,$username,PDO::PARAM_STR);
        $stmt->bindValue(2,$password,PDO::PARAM_STR);
        $stmt->bindValue(3,$id,PDO::PARAM_INT);
        $stmt->execute();
    }

    function deleteUser($id){
        $stmt=$this->PDO->prepare("delete from users where id=?");
        $stmt->bindValue(1,$id,PDO::PARAM_STR);
        $stmt->execute();
    }
    function getAllUsers(){
        $stmt=$this->PDO->prepare("select * from users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function  getUser($id){
        $stmt= $this->PDO->prepare("select * from users where id=?");
        $stmt->bindValue(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

} 