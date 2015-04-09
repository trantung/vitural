<?php
namespace Prototype\Forms\Admin;
use Prototype\Forms\BaseForm;

class AdminEditForm extends BaseForm
{
    protected $rules = array(
                            'name'=> 'required|max:16',
                            'kana'=> 'required|max:16',
                            'telephone_no'=> 'required|max:13',
                            // 'birthday'=> 'required|date_format:"Y-m-d"|after:1970-01-01',
                            'birthday'=> 'required|date_format:"Y-m-d"',
                            'password'=> 'required|between:8,32',
                            'roll_boss'=> 'required',
                            'roll'=> 'required',
                            );
    protected $messages = array(
                                'name.required' =>'名前を入力してください。',
                                'name.max' =>'名前 は16文字まで入力できます。',
                                'kana.required' =>'名前（カナ）を入力してください。',
                                'kana.max' =>'名前（カナ）は16文字まで入力できます。',
                                'telephone_no.required' =>'電話番号を入力してください。',
                                'telephone_no.max' =>'電話番号は13文字まで入力できます。',
                                'birthday.required' =>'生年月日を入力してください。',
                                'password.required' =>'パスワードを入力してください。',
                                'password.between' =>'パスワード は8文字以上、32文字以内で入力してください。',
                                'birthday.date_format' =>'生年月日 はYYYY-mm-dd形式で入力してください。',
                                // 'birthday.min' =>'生年月日 は1970-01-01から までの範囲で入力してください。',
                                'birthday.required' =>'生年月日 を入力してください。',
                                'content.max' =>'ノート は300文字以内で入力してください。',
                                'content.required' =>'必須入力項目 ノート が入力されていません。',
                                'roll_boss.required' =>'BOSSを設定する場合、権限は従業員を選択する必要があります。',
                                'roll.required' =>'権限をを従業員以外にするためには、BOSSで--を選択する必要があります。',
                            );
}
