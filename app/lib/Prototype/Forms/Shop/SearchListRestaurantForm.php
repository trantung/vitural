<?php
namespace Prototype\Forms\Shop;

class SearchListRestaurantForm extends BaseShopForm
{
    protected $rules = array(
                            'key_word'           => 'required',
    );
    
}
