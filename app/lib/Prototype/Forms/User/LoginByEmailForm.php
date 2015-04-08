<?php
namespace Prototype\Forms\User;

class LoginByEmailForm extends BaseUserForm
{
    protected $rules = array(
        'email'                 => 'required|email|unique:users',
        'password'              => 'required|alpha_num|between:6,12'
    );
}
