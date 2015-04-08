<?php
namespace Prototype\Forms\Shop;

use Prototype\Forms\BaseForm;

abstract class BaseShopForm extends BaseForm
{
    
    protected $rules = array(
                            'id'             => 'required|numeric',
                            'number_table'   => 'required|numeric',
                            'number_person'  => 'required|numeric',
                            'date'           => 'required|date_format:"Y-m-d"',
                            'time'           => 'required|date_format:"h:i"',
    );
}
