<?php
session_start();
include_once 'ControllerNote.php';

$Note = new ControllerNote();

$Note->_ControllerCreateNote($_POST['userid']);

$UserID = $_POST['userid'];

$Data = $Note->_ControllerGetLastNoteId();
foreach($data as $row){
    $NoteID = $row['idnotes'];
    break;
}

$PostFields = [
    'userid'=>$UserID,
    'noteid'=>$NoteID
];


$ch = curl_init('http://localhost/Notesapp/view/noteEdit.php');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($PostFields));
$response = curl_exec($ch);
curl_close($ch);

#header(header: 'Location:../view/mainmenu.php');

?>