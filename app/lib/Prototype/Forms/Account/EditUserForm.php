<?php
namespace Prototype\Forms\Account;
use Prototype\Forms\BaseForm;

class EditUserForm extends BaseForm
{
    protected $rules = array(
                            'display_name'  => 'required',
                            'phone'         => 'required|digits_between:8,15',
                            'email'         => 'email',
                            'facebook_email'=> 'email',
                            'first_name'    => 'required',
                            'last_name'     => 'required',
                            'status'        => 'required|numeric'
                            );
}
