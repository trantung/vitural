<?php
namespace Prototype\Forms\Admin;
use Prototype\Forms\BaseForm;

class EditForm extends BaseForm
{
    protected $rules = array(
                            'password'=> 'required',
                            );
    protected $messages = array(
                                'password.required' =>'パスワードを入力してください。',
                            );
}
