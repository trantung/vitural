<?php
namespace Prototype\Forms\Admin;
use Prototype\Forms\BaseForm;

class BossEditForm extends BaseForm
{
    protected $rules = array(
                            'name'=> 'required|max:16',
                            'kana'=> 'required|max:16',
                            'telephone_no'=> 'required',
                            'birthday'=> 'required|date_format:"Y-m-d"',
                            'password'=> 'required|between:8,32',
                            'password'=> 'required|between:8,32',
                            'content'=> 'required|max:300',
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
                                'birthday.date_format' =>'生年月日 はYYYY-mm-dd形式で入力してください。',
                                // 'birthday.min' =>'生年月日 は1970-01-01から までの範囲で入力してください。',
                                'birthday.required' =>'生年月日 を入力してください。',
                                'content.max' =>'ノート は300文字以内で入力してください。',
                                'content.required' =>'必須入力項目 ノート が入力されていません。',
                            );
}
