<?php
namespace Prototype\Forms\Account;
use Prototype\Forms\BaseForm;

class EventAddForm extends BaseForm
{
    protected $rules = array(
                            'shop_id'             => 'required',
                            'subject'             => 'required|',
                            'description'         => 'required|',
                            'start_date'          => 'required|',
                            'end_date'            => 'required|'
                            );
}
