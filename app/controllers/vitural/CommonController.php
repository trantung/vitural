<?php namespace Vitural;

class CommonController extends \BaseController {

	public function commonUpdateUser($input)
	{
		$update = array();
		$update['name'] = $input['name'];
        $update['kana'] = $input['kana'];
        $update['telephone_no'] = $input['telephone_no'];
        $update['birthday'] = $input['birthday'];
        $update['email'] = $input['email'];
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
	public function commonSearch($table,$input)
	{
		$search = \DB::table($table);
        if($input['name'] != NULL){
            $search = $search->where('name','LIKE','%'.$input['name'].'%');
        }
        if($input['email'] != NULL){
            $search = $search->where('email','LIKE','%'.$input['email'].'%');
        }
        if($input['kana'] != NULL){
            $search = $search->where('kana','LIKE','%'.$input['kana'].'%');
        }
        if($input['telephone_no'] != NULL){
            $search = $search->where('telephone_no','LIKE','%'.$input['telephone_no'].'%');
        }
        if($input['start_date'] != NULL){
            $search = $search->where('birthday','>',$input['start_date']);
        }
        if($input['end_date'] != NULL){
            $search = $search->where('birthday','<',$input['end_date']);
        }
        return $search;
	}
    public function updateUserIntoDB($input, $id, $table)
    {
        $update = $this->commonUpdateUser($input);
        $update['password'] = \Hash::make($input['password']);
        \Common::updateDB($table, $id, $update);
    }
    public function updateUserIsAdmin($input,$id,$table)
    {
        $update = $this->commonUpdateUser($input);
        $update['password'] = \Hash::make($input['password']);
        \Common::updateDB($table, $id, array('role_id'=>ADMIN));
    }
    public function updateCommentUser($input, $id)
    {
        $update_comment = array();
        $update_comment['content'] = $input['content'];
        $comment_id = \Comment::where('user_id',$id)->first()->id;
        \Common::updateDB('comments', $comment_id, $update_comment);
    }
    public function getRoleId($input)
    {
        if(isset($input['roll'])){
            $role_id = $input['roll'];
        }
        else{
            $role_id = EMPLOY;
        }
        return $role_id;
    }
    public function getMangerId($input)
    {
        if(isset($input['roll_boss'])){
            $manager_id = $input['roll_boss'];
        }
        else{
            if($input['role_id'] == ADMIN){
                $manager_id = 0;
            }
            if($input['role_id'] == BOSS){
                $manager_id = \Auth::user()->id;
            }
        }
        return $manager_id;
    }
}