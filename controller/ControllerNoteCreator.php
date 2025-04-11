<?php
session_start();
include_once 'ControllerNote.php';

$Note = new ControllerNote();

$Note->_ControllerCreateNote($_POST['userid']);

header(header: 'Location:../view/mainmenu.php');

?>