<?php
session_start();
include_once 'ControllerNote.php';

$Note = new ControllerNote();

$Note->_ControllerCreateNote($_POST['userid']);
$IdNote->_ControllerGetLastNoteId();

foreach ($IdNote as $row) {
  $_SESSION['notesession'] = $row['idnotes'];
}


header(header: 'Location:../view/noteCreate.php');

?>