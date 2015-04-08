<?php
namespace Prototype\Forms\Shop;

class CheckBookingForm extends BaseShopForm
{
    protected $rules = array(
                            'date'           => 'required|date_format:"d-m-Y"',
    );
    
}
