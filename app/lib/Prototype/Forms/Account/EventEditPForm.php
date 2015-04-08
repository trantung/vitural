<?php
namespace Prototype\Forms\Account;
use Prototype\Forms\BaseForm;

class EventEditPForm extends BaseForm
{
    protected $rules = array(
                            // 'shop_id'             => 'required',
                            'subject'             => 'required|',
                            'description'         => 'required|',
                            'start_date'          => 'required|',
                            'end_date'            => 'required|'
                            );
}
