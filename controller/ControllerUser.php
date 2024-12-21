<?php

include_once '../model/ModelUser.php';

class ControllerUser{
    public function _ControllerUsersValidate($user, $pass): array{
        try {
            $obj = new ModelUser();
            return $obj->_ModelUserValidate($user, $pass);
        } catch (Exception $e) {
            throw $e;
        }
    }
    /*
    public function _ControllerUserRegistration($name, $last_name, $username, $password): void{
        try {
            $obj = new ModelUser();
            $obj->_ModelUserResistration($name, $last_name, $username, $password);
            echo "<script>alert('Successfully Registered');</script>";
        } catch (Exception $e) {
            throw $e;
        }
    }
        */

    public function _ControllerAllUsers(): array{
        try {
            $obj = new ModelUser();
            return $obj->_ModelAllUsers();
        } catch (Exception $e) {
            throw $e;
        }
    }
}