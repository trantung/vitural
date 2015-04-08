<?php
namespace Prototype\Forms\Admin;
use Prototype\Forms\BaseForm;

class LoginForm extends BaseForm
{
    protected $rules = array(
                            'email'=> 'required|email',
                            'password'=> 'required|between:6,32',
                            );
    protected $messages = array(
                                'email.required' =>'メールアドレスを入力してください。',
                                'email.email' =>'メールアドレスを入力してください。',
                                'password.required' =>'パスワードを入力してください。',
                                'password.between' =>'メールアドレスまたは パスワード が誤っています。',
                            );
}
