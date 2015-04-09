<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Common extends Eloquent
{
	public static function updateDB($table, $id, $update)
	{
		DB::table($table)->where('id',$id)->update($update);
	}
    public static function createUser($create_user)
    {
        User::create($create_user);
        $user_id = User::where('email',$create_user['email'])->first()->id;
        return $user_id;
    }
    public static function createComment($comment)
    {
        Comment::create($comment);
    }
}