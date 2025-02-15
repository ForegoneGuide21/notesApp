<?php

include_once '../util/connection.php';

class ModelUser
{
    //Variable that will be use to use the database

    public function __construct()
    {
        //Singleton is to activate and connect to our database
        $con = new connection();
    }

    /*
     1.- Is it a variable or function?
     2.- Is it private or public?
     3.- Is it a constructor with parameters or empty?
     4.- What is going to be inside the function?
    */

    public function _ModelUserValidate($user, $pass)
    {
        try {
            //Prepare is to right the SQL command
            $obj = connection::singleton();
            $query = $obj->prepare('SELECT * FROM userT WHERE username=? and password=?');

            $query->bindParam(1, $user);
            $query->bindParam(2, $pass);
            $query->execute();

            $vector = $query->fetchAll();
            $query = null;
            return $vector;

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function _ModelAllUsers()
    {
        try {
            //Prepare is to right the SQL command
            $obj = connection::singleton();
            $query = $obj->prepare('SELECT * FROM userT');

            $query->execute();

            $vector = $query->fetchAll();
            $query = null;
            return $vector;

        } catch (Exception $e) {
            throw $e;
        }
    }


/*
    public function _ModelUserResistration($name, $last_name, $username, $password)
    {
        try {
            $obj = connection::singleton();
            $query = $obj->prepare('INSERT INTO user (id, name, last_name, username, password) VALUES (NULL, ?, ?, ?, ?)');

            $query->bindParam(1, $name);
            $query->bindParam(2, $last_name);
            $query->bindParam(3, $username);
            $query->bindParam(4, $password);
            $query->execute();

        } catch (Exception $e) {
            throw $e;
        }
    }
*/
}