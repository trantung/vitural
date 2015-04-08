<?php
namespace Prototype\Forms\Styleshare;
use Prototype\Forms\BaseForm;
class UpdateProfileForm extends BaseForm
{
    protected $rules = array(
        'first_name'              => 'required',
        'last_name'              => 'required',
    );
}
