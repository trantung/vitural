<?php namespace Prototype\Filters;

class WebFilters {
    public function auth() {
        if (\Auth::guest()) \Prototype\Common\ThrowCommonExceptions::throwUnAuthenticate();
    }

    public function employee() {
            if (\Auth::guest()) 
            return \Redirect::route('vitural.getlogin');
    }

    public function admin() {
        if (\Auth::guest()){
            return \Redirect::route('vitural.getlogin');
        }
        else if (\Auth::user()->role_id == EMPLOY){ 
            return \Redirect::route('employee.top');
        }
    }
}