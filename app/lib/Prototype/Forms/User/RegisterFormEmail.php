<?php
namespace Prototype\Forms\User;

class RegisterFormEmail extends BaseUserForm
{
    protected $rules = array(
        'email'                 => 'required|email'
    );
}
