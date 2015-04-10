<?php
namespace Prototype\Forms\Admin;
use Prototype\Forms\BaseForm;

class BossEmailForm extends BaseForm
{
    protected $rules = array(
                            'email'=>'required|email|unique:users|confirmed',
                            'email_conf'=>'required|email',
                            );
    protected $messages = array(
                                'email.required' =>'メールアドレスを入力してください。',
                                'email.email' =>'メールアドレス（確認）には有効なメールアドレスを入力してください。',
                                'email.unique' =>'メールアドレス は既に使用されています。',
                                'email_conf.required' =>'メールアドレス（確認）を入力してください。',
                                'email.confirmed' =>'メールアドレスと メールアドレス（確認）が異なっています。',
                                'email_conf.email' =>'メールアドレスと には有効なメールアドレスを入力してください。',
                            );
}
