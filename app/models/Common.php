<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Common extends Eloquent
{
	public static function updateDB($table, $id, $update)
	{
		DB::table($table)->where('id',$id)->update($update);
	}
}