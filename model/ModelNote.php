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

        try {
            //Prepare is to right the SQL command
            $obj = connection::singleton();
            $query = $obj->prepare('SELECT idnotes FROM note ORDER BY idnotes DESC LIMIT 1;');

            $query->execute();

            $vector = $query->fetchAll();
            $query = null;


        } catch (Exception $e) {
            throw $e;
        }

        //Then we will add it to note Manage
        try {
            $obj = connection::singleton();
            $query = $obj->prepare('INSERT INTO noteMng (user_iduser, note_idnotes) VALUES (?, ?)');

            $query->bindParam(1, $userId);
            foreach ($vector as $row) {
                $query->bindParam(2, $row['idnotes']);
            }

            $query->execute();

        } catch (Exception $e) {
            throw $e;
        }

        //RETRIEVE INFORMATION OF USER AND NOTE BY USING NOTE MANAGE
        try {
            //Prepare is to right the SQL command
            $obj = connection::singleton();
            $query = $obj->prepare('SELECT * FROM noteMng as nm INNER JOIN userT as u ON nm.user_iduser = u.iduser INNER JOIN note as n ON nm.note_idnotes = n.idnotes note_idnotes = ? AND user_iduser = ?');

            $query->bindParam(1, $note_idnotes);
            $query->bindParam(2, $user_iduser);

            $query->execute();

            $vector = $query->fetchAll();
            $query = null;
            return $vector;

        } catch (Exception $e) {
            throw $e;
        }


    }
}
