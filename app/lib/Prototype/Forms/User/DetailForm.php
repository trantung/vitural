<?php
namespace Prototype\Forms\User;

class DetailForm extends BaseUserForm
{
    
    protected $columns = ["firstname", "lastname", "username", "email"];
    
    public function validate($formData, $parameters = null)
    {
        $this->_addUniqueId(\Auth::user()->id);
        parent::validate($formData, $parameters);
    }
}
