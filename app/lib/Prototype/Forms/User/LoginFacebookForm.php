<?php
namespace Prototype\Forms\User;

class LoginFacebookForm extends BaseUserForm
{
    protected $rules = array(
        'uid'             => 'required',
        'email'  => 'required|email',
        'first_name'      => 'required',
        'last_name'       => 'required',
        'gender'          => 'required|integer|between:1,3',
    );

    public function checkFacbookEmailExist($check_facebook_email, $session_id)
    {   
        if($check_facebook_email != NULL && $session_id != NULL){
            throw new \Prototype\Exceptions\FacbookEmailExistException();
        }
    }

    public function loginByFacebookEmailFirst($input, $randomString,$device_id, $login_datetime)
    {
        $input['status'] = NON_BLOCK;
        $user = \User::create($input);
        $facebook_email = \DB::table('users')->where('facebook_email', $input['facebook_email'])->first();
        $user_id = $facebook_email->id;
        $created_at = \Carbon\Carbon::now();
        $updated_at = \Carbon\Carbon::now();
        $insert_session = \Login::insert(array(
                                    'user_id' => $user_id,
                                    'device_id' =>$device_id,
                                    'login_datetime' =>$login_datetime,
                                    'session_id' => $randomString,
                                    'token_id' =>'',
                                    'created_at' =>$created_at,
                                    'updated_at' =>$updated_at,
                                    ));
        return $this->makeJsonFacebook($facebook_email, $randomString);
    }

    public function checkFacbookEmailIsLogging($check_facebook_email, $session_id,$randomString,$device_id, $login_datetime)
    {
        if($check_facebook_email != NULL && $session_id == NULL){
            $user_id = $check_facebook_email->id;
            $login = \Login::where('user_id','=',$user_id)->first();
            $insert_session = \Login::where('user_id', $user_id)->where('device_id', $device_id)
                                            ->update(array(
                                            'login_datetime' =>$login_datetime,
                                            'session_id' => $randomString,
                                            ));
            return $this->makeJsonFacebook($check_facebook_email, $randomString);
        }
    }
    
    private function makeJsonFacebook($facebook_email, $randomString){
        return \Response::json(array(
                                    "code"=>0,
                                    "message"=>"Success",
                                    "data"=>array(
                                                "app-session-id"=>$randomString,
                                                "user_info"=>array(
                                                    "user_id"=>$facebook_email->id,
                                                    "kind"=>"facebook",
                                                    "first_name"=>$facebook_email->first_name,
                                                    "last_name"=>$facebook_email->last_name,
                                                    "gender"=>$facebook_email->gender,
                                                    "introduce"=>""
                                                )
                                            )
                                    )
                                );
    }
}
