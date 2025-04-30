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

    public function _ControllerGetNoteInfo($iduser): array{
        try {
            $obj = new ModelNote();
            return $obj->_ModelGetNoteInfo($iduser);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function _ControllerSpecificNote($iduser, $noteId): array{
        try {
            $obj = new ModelNote();
            return $obj->_ModelSpecificNote($iduser, $noteId);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function _ControllerGetLastNoteId(): array{
        try {
            $obj = new ModelNote();
            return $obj->_RetrieveLastNote();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function _ControllerUpdateNote($idnotes, $title, $notescontent){
        try {
            $obj = new ModelNote();
            $result = $obj->_ModelUpdateNote($idnotes, $title, $notescontent);
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                header('Content-Type:application/json');
                echo json_encode(['success'=>$result]);
                exit;
            }
            return $result;
            
            
        } catch (Exception $th) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                header('Content-Type:application/json');
                echo json_encode(['success'=>false, 'error' =>$th->getMessage()]);
                exit;
            }
            throw $th;
        }
    }
    
}