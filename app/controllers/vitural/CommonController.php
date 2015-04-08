<?php namespace Vitural;

class CommonController extends \BaseController {

	public function commonUpdateUser($input)
	{
		$update = array();
		$update['name'] = $input['name'];
        $update['kana'] = $input['kana'];
        $update['telephone_no'] = $input['telephone_no'];
        $update['birthday'] = $input['birthday'];
        $update['password'] = \Hash::make($input['password']);
        return $update;
	}
	public function commonReturnInputUser($user_detail)
	{
		$input = array();
		$input['name'] = $user_detail->name;
        $input['kana'] = $user_detail->kana;
        $input['telephone_no'] = $user_detail->telephone_no;
        $input['birthday'] = $user_detail->birthday;
        return $input;
	}
}