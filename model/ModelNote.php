<?php

include_once '../util/connection.php';

class ModelNote
{
    public function __construct()
    {
        $con = new connection();
    }

    ///Function of Inserting Default Note Data
    public function _ModelCreateNote($userId): array
    {
        // Step 1: Create the note
        try {
            $obj = connection::singleton();

            //OBS 1
            //We put the wrong name of the id name and the order was wrong
            $query = $obj->prepare('INSERT INTO note (idnotes, title, created, notescontent) VALUES (NULL, ?, ?, ?)');

            $title = "untitled";
            $description = "untitled";
            $date = date("Y-m-d H:i:s");

            $query->bindParam(1, $title);
            $query->bindParam(2, $date);
            $query->bindParam(3, $description);

            $query->execute();
            $query = null;

        } catch (Exception $e) {
            throw new Exception("Error creating note: " . $e->getMessage());
        }

        // Step 2: Retrieve the last inserted note ID
        try {
            //OBS 2
            //We put the wrong name of the id name for notes
            $query = $obj->prepare('SELECT idnotes FROM note ORDER BY idnotes DESC LIMIT 1;');
            $query->execute();

            $lastNote = $query->fetch(PDO::FETCH_ASSOC);
            $query = null;

            if (!$lastNote) {
                throw new Exception("Failed to retrieve last inserted note ID.");
            }

            //OBS 3
            //We put the wrong name of the id name
            $idnotes = $lastNote['idnotes'];

        } catch (Exception $e) {
            throw new Exception("Error retrieving note ID: " . $e->getMessage());
        }

        // Step 3: Add the note to noteMng
        try {
            $query = $obj->prepare('INSERT INTO noteMng (user_iduser, note_idnotes) VALUES (?, ?)');
            $query->bindParam(1, $userId);
            $query->bindParam(2, $idnotes);

            $query->execute();
            $query = null;

        } catch (Exception $e) {
            throw new Exception("Error linking note to user: " . $e->getMessage());
        }

        // Step 4: Retrieve full information about the note and its user
        try {
            $query = $obj->prepare('SELECT * 
            FROM noteMng AS nm 
            INNER JOIN userT AS u ON nm.user_iduser = u.iduser 
            INNER JOIN note AS n ON nm.note_idnotes = n.idnotes
            WHERE nm.note_idnotes = ? AND nm.user_iduser = ?'
            );

            $query->bindParam(1, $idnotes);
            $query->bindParam(2, $userId);

            $query->execute();

            $noteDetails = $query->fetchAll(PDO::FETCH_ASSOC);
            $query = null;

            return $noteDetails;

        } catch (Exception $e) {
            throw new Exception("Error retrieving note details: " . $e->getMessage());
        }
    }

    // Function to retrieve notes information depending on the id notes
    public function _ModelGetNoteInfo($iduser)
    {
        try {
            //Connect to the database
            $obj = connection::singleton();

            //Prepare the query
            $query = $obj->prepare('SELECT * 
            FROM noteMng AS nm 
            INNER JOIN userT AS u ON nm.user_iduser = u.iduser 
            INNER JOIN note AS n ON nm.note_idnotes = n.idnotes
            WHERE nm.user_iduser = ?');

            //Bind the parameters
            $query->bindParam(1, $iduser);

            //Execute the query
            $query->execute();

            //Fetch the results
            $vector = $query->fetchAll();

            //Close the connection
            $query = null;

            //Return the results
            return $vector;

        } catch (Exception $e) {
            throw new Exception("Error retrieving note details: " . $e->getMessage());
        }
    }

    public function _ModelSpecificNote($userId, $noteId)
    {


        try {
            //Connect to the database
            $obj = connection::singleton();

            //Prepare the query
            $query = $obj->prepare('SELECT * 
        FROM noteMng AS nm 
        INNER JOIN userT AS u ON nm.user_iduser = u.iduser 
        INNER JOIN note AS n ON nm.note_idnotes = n.idnotes
        WHERE nm.user_iduser = ? AND nm.note_idnotes = ?');

            //Bind the parameters
            $query->bindParam(1, $userId);
            $query->bindParam(2, $noteId);

            //Execute the query
            $query->execute();

            //Fetch the results
            $vector = $query->fetchAll();

            //Close the connection
            $query = null;

            //Return the results
            return $vector;

        } catch (Exception $e) {
            throw new Exception("Error retrieving note details: " . $e->getMessage());
        }
    }

    public function _RetrieveLastNote(){
        try {
            $obj = connection::singleton();
            $query = $obj->prepare('SELECT idnotes FROM note ORDER BY idnotes DESC LIMIT 1;');
            $query->execute();

            $vector = $query->fetchAll();
            $query = null;

            return $vector;


        } catch (Exception $e) {
            throw new Exception("Error retrieving note ID: " . $e->getMessage());
        }
    }

    public function _ModelUpdateNote($idnotes, $title, $notescontent){
        try {
            $obj = connection::singleton();
            $query = $obj->prepare('UPDATE note SET title = :title, notescontent= :notescontent WHERE idnotes = :idnotes');   //sql statement
            $query->bindParam(':title', $title);
            $query->bindParam(':notescontent', $notescontent);
            $query->bindParam(':idnotes', $idnotes);
            echo $query->execute();
        } catch (Exception $th) {
            throw $th;
        }
    }





}
