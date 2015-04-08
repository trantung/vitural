<?php
namespace Prototype\Forms\User;

class ChangePassForm extends BaseUserForm
{
    
    protected $rules = array('old_pass' => 'required|alpha_num|between:6,12', 'new_pass' => 'required|alpha_num|between:6,12');
}
