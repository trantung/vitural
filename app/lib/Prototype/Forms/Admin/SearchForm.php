<?php
namespace Prototype\Forms\Admin;
use Prototype\Forms\BaseForm;

class SearchForm extends BaseForm
{
    protected $rules = array(
                            'name'=> 'max:16',
                            'kana'=> 'max:16',
                            'telephone_no'=> 'max:13',
                            'start_date'=> 'required',
                            'end_date'=> 'required',
                            // 'birthday'=> 'required|date_format:"Y-m-d"',

                            );
    protected $messages = array(
                                'name.max' =>'名前 は16文字まで入力できます。',
                                'kana.max' =>'名前（カナ）は16文字まで入力できます。',
                                'telephone_no.max' =>'電話番号は13文字まで入力できます。',
                                'start_date.required' =>'生年月日の終了日は生年月日（開始日）と同じかそれ以降を入力してください。',
                                'end_date.required' =>'生年月日の終了日は生年月日（開始日）と同じかそれ以降を入力してください。',
                                // 'birthday.min' =>'生年月日 は1970-01-01から までの範囲で入力してください。',
                            );
}
