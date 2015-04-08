<?php
namespace Prototype\Forms\Account;
use Prototype\Forms\BaseForm;

class ManagerMenuUpdateForm extends BaseForm
{
    protected $rules = array(
                            'name'              => 'required',
                            'description'       => 'required',
                            // 'price'             => 'required'
                            );
}
