<?php
namespace Prototype\Forms\Admin;
use Prototype\Forms\BaseForm;

class EmailFormAdd extends BaseForm
{
    protected $rules = array(
                            'name'=> 'required|max:16',
                            'kana'=> 'required|max:16',
                            'telephone_no'=> 'required',
                            'birthday'=> 'required|date:Y-m-d|after:1970-01-01',
                            'password'=> 'required|between:8,32',
                            'content'=> 'required|max:300',
                            'email'=>'required|email|unique:users',
                            'email_conf'=>'required|email|same:email',
                            );
            
    protected $messages = array(
                                'name.required' =>'名前を入力してください。',
                                'name.max' =>'名前 は16文字まで入力できます。',
                                'kana.required' =>'名前（カナ）を入力してください。',
                                'kana.max' =>'名前（カナ）は16文字まで入力できます。',
                                'telephone_no.required' =>'電話番号を入力してください。',
                                'birthday.required' =>'生年月日を入力してください。',
                                'password.required' =>'パスワードを入力してください。',
                                'password.between' =>'パスワード は8文字以上、32文字以内で入力してください。',
                                'birthday.date' =>'生年月日 はYYYY-mm-dd形式で入力してください。',
                                'birthday.after' =>'生年月日 は1970-01-01から までの範囲で入力してください。',
                                'birthday.before' =>'生年月日（開始日） は1970-01-01から{now year - 10year}-01-01までの範囲で入力してください。',
                                'birthday.required' =>'生年月日 を入力してください。',
                                'content.max' =>'ノート は300文字以内で入力してください。',
                                'content.required' =>'必須入力項目 ノート が入力されていません。',
                                'email.required' =>'メールアドレスを入力してください。',
                                'email.email' =>'メールアドレス（確認）には有効なメールアドレスを入力してください。',
                                'email.unique' =>'メールアドレス は既に使用されています。',
                                'email_conf.required' =>'メールアドレス（確認）を入力してください。',
                                'email_conf.same' =>'メールアドレスと メールアドレス（確認）が異なっています。',
                                'email_conf.email' =>'メールアドレスと には有効なメールアドレスを入力してください。',
                            );
    public function validateDates() {
        $this->rules['birthday'] .= '|before:' . (date('Y') - 10) . '-01-01';
    return $this;
    }
}
