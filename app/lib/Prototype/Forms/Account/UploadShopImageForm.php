<?php
namespace Prototype\Forms\Account;
use Prototype\Forms\BaseForm;

class UploadShopImageForm extends BaseForm
{
    protected $rules = array(
                            'image_url'         => 'required'
                            );
}
