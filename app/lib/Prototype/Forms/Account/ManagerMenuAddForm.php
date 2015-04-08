<?php
namespace Prototype\Forms\Account;
use Prototype\Forms\BaseForm;

class ManagerMenuAddForm extends BaseForm
{
    protected $rules = array(
                            'name'                => 'required',
                            'description'         => 'required',
                            // 'price'               => 'required|numeric'
                            );
}
