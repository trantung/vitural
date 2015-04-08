<?php
namespace Prototype\Forms\User;

class RegisterForm extends BaseUserForm
{
    protected $rules = array(
        'display_name'                  => 'required|alpha_spaces|min:2',
        'password'              => 'required|alpha_num|between:6,12',
        'first_name'              => 'required',
        'last_name'              => 'required',
        'phone'              => 'required|numeric',
    );
}
