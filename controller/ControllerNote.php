<?php

include_once '../model/ModelNote.php';

class ControllerNote{
    public function _ControllerCreateNote($userId): array{
        try {
            $obj = new ModelNote();
            return $obj->_ModelCreateNote($userId);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function _ControllerRetrieveNoteMng($userId): array{
        try {
            $obj = new ModelNote();
            return $obj->_RetrieveNoteMng($userId);
        } catch (Exception $e) {
            throw $e;
        }
    }
}