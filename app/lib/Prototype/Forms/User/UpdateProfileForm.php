<?php
namespace Prototype\Forms\User;

class UpdateProfileForm extends BaseUserForm
{
    // protected $rules = array(
    //     'first_name'      => 'required',
    //     'last_name'       => 'required',
    //     'gender'          => 'required|integer|between:1,3',
    //     'introduce'       =>'required',
    //     'dob'             =>'required|date_format:"Y-m-d"'
    // );
    protected $rules = array(
        'email'=> 'required|email|unique:users',
        'display_name'                  => 'required|alpha_spaces|min:2',
        'first_name'              => 'required',
        'last_name'              => 'required',
        'phone'              => 'required|numeric',
    );

    public function getRule()
    {
        return $this->rules;
    }
}
