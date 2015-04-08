<?php
namespace Prototype\Forms\Account;
use Prototype\Forms\BaseForm;

class AddUserForm extends BaseForm
{
    protected $rules = array(
                            'display_name'  => 'required',
                            'password'      => 'required|min:6',
                            'phone'         => 'required|digits_between:8,15',
                            'email'         => 'email|unique:users',
                            'facebook_email'=> 'email|unique:users',
                            'first_name'    => 'required',
                            'last_name'     => 'required',
                            'status'        => 'required|numeric'
                            );
}
