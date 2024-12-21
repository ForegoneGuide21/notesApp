<?php

session_start();
include 'ControllerUser.php';

$pro = new ControllerUser();

if($_POST["user"] == ""||$_POST["password"] == ""){
    header(header: 'Location:../login.php?err=1');
}
else{
    $data = $pro->_ControllerUsersValidate($_POST["user"], $_POST["password"]);
    foreach($data as $row){
        $_SESSION['user'] = $row['username'];
        $_SESSION['pass'] = $row['password'];
    }
    
    if(count($data) == 0){
        header(header: 'Location:../login.php?err=2');
    }
    else{
        header(header: 'Location:../view/mainmenu.php?value=');
    }
}

/*
use simple quotes for sql after setup
use double quotes after the sql is set up.
use simple quotes for all database names
*/

