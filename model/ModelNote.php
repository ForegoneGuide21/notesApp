<?php

include_once '../util/connection.php';

class ModelNote
{
    public function __construct()
    {
        $con = new connection();
    }

    ///Function of Inserting Default Note Data
    public function _ModelCreateNote($userId)
    {
        //First we will create the note
        try {
            $obj = connection::singleton();
            $query = $obj->prepare('INSERT INTO note (id, title, description, date) VALUES (NULL, ?, ?, ?)');

            $id = $userId;
            $title = "untitled";
            $description = "untitled";
            $date = date("Y-m-d H:i:s");
        
            $query->bindParam(1, $title);
            $query->bindParam(2, $description);
            $query->bindParam(3, $date);
            $query->execute();

        } catch (Exception $e) {
            throw $e;
        }

        //We need to retrieve the id of the note. We will get the last id to put it into the insert of the note manage

        //Then we will add it to note Manage
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
}


untitled0 -> dog names
untitled1
untitled2
untitled3
