<?php
namespace Prototype\Forms\Admin;
use Prototype\Forms\BaseForm;

class SearchForm extends BaseForm
{

    protected $rules = array(
                            'name'=> 'max:16',
                            'kana'=> 'max:16',
                            'telephone_no'=> 'max:13',
                            'start_date'        => 'date:Y-m-d|after:1970-01-01',
                            'end_date'          => 'date:Y-m-d|after:start_date',

                            );
    protected $messages = array(
                                'name.max' =>'名前 は16文字まで入力できます。',
                                'kana.max' =>'名前（カナ）は16文字まで入力できます。',
                                'telephone_no.max' =>'電話番号は13文字まで入力できます。',
                                'start_date.required' =>'生年月日の終了日は生年月日（開始日）と同じかそれ以降を入力してください。',
                                'end_date.required' =>'生年月日の終了日は生年月日（開始日）と同じかそれ以降を入力してください。',
                                'start_date.after' =>'生年月日 は1970-01-01から までの範囲で入力してください。',
                                'end_date.after' =>'生年月日（終了日）は生年月日（開始日）と同じかそれ以降を入力してください。',
                                'start_date.before' =>'生年月日（開始日） は1970-01-01から{now year - 10year}-01-01までの範囲で入力してください。',
                                'end_date.before' =>'生年月日（終了日）は1970-01-01から{now year - 10year}-01-01までの範囲で入力してください。',
                            );

    public function validateDates() {
        $this->rules['start_date'] .= '|before:' . (date('Y') - 10) . '-01-01';
        $this->rules['end_date'] .= '|before:' . (date('Y') - 10) . '-01-01';
        return $this;
    }
}
