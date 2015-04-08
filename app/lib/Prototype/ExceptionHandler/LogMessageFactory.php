<?php
namespace Prototype\ExceptionHandler;

class LogMessageFactory {
    public static function makeLog($type, $e){
        $unLogCases = ["FormValidationException"];
        if (in_array($type, $unLogCases)) return;

        $msg = "";
        switch ($type) {
            case 'PDOException':
                $msg = "error: " .$e->getMessage() . " --- From url: " . \Request::url();
                break;            
            case 'NotFoundHttpException':
                $msg = "NotFoundHttpException Route: " . \Request::url();
                break;
            case 'ModelNotFoundException':
                $msg = "ModelNotFoundException Route: " . \Request::url();
                break;
            default:
                $msg = "error: " .$e->getMessage();
                break;
        }
        \Log::error($msg);
        return;
    }
}