<?php
namespace Prototype\Forms\User;

class SigninForm extends BaseUserForm
{
    
    protected $rules = array('email' => 'required|email|min:6', 'password' => 'required|alpha_num|between:6,12',);
}
