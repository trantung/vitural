<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Comment extends Eloquent
{
    protected $table = 'comments';
    protected $fillable = array('user_id', 'content');
}