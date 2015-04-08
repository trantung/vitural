<?php
namespace Prototype\ExceptionHandler;

class ApiExceptionHandler {

    private function makeJsonResponse($msg, $code) {
        return \Response::json([
                "message" => $msg,
                "code" => $code
        ]);
    }

    public function handleException(){
        return $this->makeJsonResponse("general exception", "1000");
    }

    public function handleModelNotFoundException(){
        return $this->makeJsonResponse("model not found exception", "1001");
    }

    public function handlePDOException(){
        return $this->makeJsonResponse("pdo exception", "1002");
    }

    public function handleNotFoundHttpException(){
        return $this->makeJsonResponse("not found http exception", "1003");
    }    

    public function handleFormValidationException(){
        return $this->makeJsonResponse("validation exception", "1004");
    }

    public function handleMissingParameterException(){
        return $this->makeJsonResponse("missing parameter", "1002");
    }

    public function handleUnAuthenticatedException(){
        return $this->makeJsonResponse("authentication exception", "1005");
    }
    public function handleLoginFacebookException(){
        return $this->makeJsonResponse("Parameters invalid", "1006");
    }
    public function handleLoginGoogleException(){
        return $this->makeJsonResponse("Parameters invalid", "1006");
    }
    public function handleFacbookEmailExistException(){
        return $this->makeJsonResponse("facebook_email is using, please logout first", "1005");
    }
    public function handleGoogleEmailExistException(){
        return $this->makeJsonResponse("google_email is using, please logout first", "1005");
    }
    public function handleAccountNotExistException(){
        return $this->makeJsonResponse("Account not exist", "1010");
    }
    public function handleValidationHeaderException(){
        return $this->makeJsonResponse("Header is must valid", "1008");
    }

    public function handleEmailExistException(){
        return $this->makeJsonResponse("Email is existed", "1005");
    }

    public function handleRestaurantNotBookingException(){
        return $this->makeJsonResponse('Restaurant not booking', '1012');
    }
    public function handleSessionErrorException(){
        return $this->makeJsonResponse('Session is valid', '1001');
    }
}