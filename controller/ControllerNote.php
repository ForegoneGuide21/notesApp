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

    public function _ControllerGetNoteInfo($idnote): array{
        try {
            $obj = new ModelNote();
            return $obj->_ModelGetNoteInfo($idnote);
        } catch (Exception $e) {
            throw $e;
        }
    }
}