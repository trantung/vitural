<?php
namespace Prototype\Forms\Account;
use Prototype\Forms\BaseForm;

class ManagerShopForm extends BaseForm
{
    protected $rules = array(
                            'name'          => 'required',
                            'description'   => 'required',
                            'address'       => 'required',
                            'phone'         => 'required|digits_between:8,15',
                            'service'       => 'required',
                            'total_person'  => 'required|numeric',
                            'city_id'       => 'required',
                            'lat'           => 'numeric',
                            'long'          => 'numeric',
                            'time_start'    => '',
                            'time_end'      => '',
                            'status'        => 'required|numeric'
                            );
}
