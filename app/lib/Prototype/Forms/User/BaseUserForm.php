<?php
namespace Prototype\Forms\User;

use Prototype\Forms\BaseForm;

abstract class BaseUserForm extends BaseForm
{
    
    protected $rules = array(
        'first_name'            => 'required|alpha_spaces|min:2',
        'name'                  => 'required|alpha_spaces|min:2',
        'last_name'             => 'required|alpha_spaces|min:2',
        'username'              => 'required|alpha_num|min:3|unique:users',
        'email'                 => 'required|email|unique:users',
        'password'              => 'required|alpha_num|between:6,12|confirmed',
        'password_confirmation' => 'required|alpha_num|between:6,12',
        'old_pass'              => 'required|between:6,12', 
        'new_pass'              => 'required|between:6,12',
        'phone'                 => 'required|between:8,15'
    );
}
