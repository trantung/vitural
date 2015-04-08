<?php
namespace Prototype\ExceptionHandler;

class WebExceptionHandler {    

    public function handleModelNotFoundException(){
        return \View::make('errors.customError');
    }

    public function handlePDOException(){
        return \View::make('errors.customError');
    }

    public function handleNotFoundHttpException(){
        return \View::make('errors.404Error');
    }

    public function handleException(){
        return \View::make('errors.customError');
    }

    public function handleFormValidationException($e){
        return \Redirect::back()
        // return \Redirect::route('createShop')
                    ->withInput()
                    ->withErrors($e->getErrors())
                    ->withMessage('The following errors occurred');
    }

    public function handleMissingParameterException(){
        return \Redirect::back()
            ->withInput()
            ->withMessage('The following errors occurred');
    }

    public function handleUnAuthenticatedException(){
        // return \Redirect::guest(action("UsersController@getLogin"));
        return \Redirect::guest('/admin/member/login');
    }

}