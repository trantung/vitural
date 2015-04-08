<?php
namespace Prototype\Forms\Account;
use Prototype\Forms\BaseForm;

class ReservationForm extends BaseForm
{
    protected $rules = array(
                            // 'email'             => 'required|email|exists:users',
                            'reservation_date'  => 'required',
                            'reservation_time'  => 'required',
                            'status'            => 'required|numeric',
                            'guest_total'       => 'required|numeric'
                            // 'table_total'       => 'required|numeric'
                            );
}
