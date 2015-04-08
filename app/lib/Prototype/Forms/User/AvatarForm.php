<?php
namespace Prototype\Forms\User;

class AvatarForm extends BaseUserForm
{
    protected $rules = array('avatar'=> 'required|image');

}
