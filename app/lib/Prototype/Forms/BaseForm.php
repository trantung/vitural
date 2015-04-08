<?php
namespace Prototype\Forms;

use Laracasts\Validation\FormValidator;

abstract class BaseForm extends FormValidator
{
    
    protected $columns = [];
            
    protected function _addUniqueId($id)
    {
        foreach ($this->rules as $key => $value) {
            $replaced = preg_replace("/(unique:[a-z]+)/", "$1,{$key},{$id}", $value);
            $this->rules[$key] = $replaced;
        }
    }

    protected function _selectColumns()
    {
        if (count($this->columns) > 0) {
            $rules = [];
            foreach ($this->columns as $key) {
                $rules[$key] = $this->rules[$key];
            }
            $this->rules = $rules;
        }
    }
    
    public function validate($formData, $parameters = null)
    {
        if ($parameters != null)
            $this->checkMissing($parameters);
        $this->_selectColumns();
        parent::validate($formData);
    }
    public function validateImage($formData, $parameters = null)
    {
        if ($parameters != null)
            $this->checkMissingImage($parameters);
        $this->_selectColumns();
        parent::validate($formData);
    }
    private function checkMissingImage($parameters){
        foreach ($parameters as $parameter) {
            $check = \Input::file($parameter);
            if($check == NULL){
                throw new \Prototype\Exceptions\MissingParameterException();                
            } 
        }
    }

    private function checkMissing($parameters){
        foreach ($parameters as $parameter) {
            $check = \Input::get($parameter);
            if($check == NULL){
                throw new \Prototype\Exceptions\MissingParameterException();                
            } 
        }
    }

    public function checkHeaderSession()
    {
        $session_id = \Request::header('app-session-id');
        if($session_id == NULL){
            throw new \Prototype\Exceptions\MissingParameterException();
        }
        $check = \Login::where('session_id',$session_id)->first();
        if($check == NULL){
            throw new \Prototype\Exceptions\SessionErrorException();
        }
    }
    public function checkAccountNotExist($session_id)
    {
        $login = \Login::where('session_id',$session_id)->first();
        if($login == NULL){
            throw new \Prototype\Exceptions\AccountNotExistException();
        }
    }
    public function validateEmailExist($input){
        $email = \DB::table('users')->where('email', $input['email'])->first();
        if($email != null)
            throw new \Prototype\Exceptions\EmailExistException();
    }

    public function checkShopBooking($id)
    {
        if(!\Shop::where('id',$id)->first()){

            throw new \Prototype\Exceptions\RestaurantNotBookingException();
        }
    }
}
