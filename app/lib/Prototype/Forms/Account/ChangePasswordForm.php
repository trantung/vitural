<?php
namespace Prototype\Forms\Account;
use Prototype\Forms\BaseForm;

class ChangePasswordForm extends BaseForm
{
    protected $rules = array(
                            'old_password'      => 'required',
                            'new_password'      => 'required|min:6',
                            'confirm_password'  => 'required|same:new_password',
                            );
}
