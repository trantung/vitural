<?php
namespace Prototype\Forms\Shop;

class BookingForm extends BaseShopForm
{
    protected $rules = array(
                            'id'             => 'required|numeric',
                            'number_person'  => 'required|numeric',
                            'date'           => 'required|date_format:"d-m-Y"',
                            'time'           => 'required|date_format:"H:i"',
    );
}
