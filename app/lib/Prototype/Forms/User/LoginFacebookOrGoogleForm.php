<?php
namespace Prototype\Forms\User;

class LoginFacebookOrGoogleForm extends BaseUserForm
{
    protected $rules = array(
        'uid'             => 'required',
        'email'  => 'required|email',
        'first_name'      => 'required',
        'last_name'       => 'required',
        'gender'          => 'required|integer|between:1,3',
    );

    public function checkFacebookOrGoogleEmailExist($check_email, $session_id, $remote_source)
    {   
        if($check_email != NULL && $session_id != NULL){
            switch ($remote_source) {
                case 'facebook':
                    throw new \Prototype\Exceptions\FacbookEmailExistException();
                break;
                
                case 'google':
                    throw new \Prototype\Exceptions\GoogleEmailExistException();
                break;
            }
        }
    }

    public function loginByFacebookOrGoogleEmailFirst($input, $randomString,$device_id, $login_datetime, $remote_source)
    {
        $input['status'] = NON_BLOCK;
        $user = \User::create($input);
        $remote_source = $remote_source . '_email';
        $email = \DB::table('users')->where($remote_source, $input[$remote_source])->first();
        $user_id = $email->id;
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
        return $this->makeJsonFacebookOrGoogle($email, $randomString);
    }

    public function checkFacebookOrGoogleEmailIsLogging($check_email, $session_id,$randomString,$device_id, $login_datetime)
    {
        if($check_email != NULL && $session_id == NULL){
            $user_id = $check_email->id;
            $login = \Login::where('user_id','=',$user_id)->first();
            $insert_session = \Login::where('user_id', $user_id)->where('device_id', $device_id)
                                            ->update(array(
                                            'login_datetime' =>$login_datetime,
                                            'session_id' => $randomString,
                                            ));
            return $this->makeJsonFacebookOrGoogle($check_email, $randomString);
        }
    }
    
    private function makeJsonFacebookOrGoogle($email, $randomString){
        return \Response::json(array(
                                    "code"=>0,
                                    "message"=>"Success",
                                    "data"=>array(
                                                "app-session-id"=>$randomString,
                                                "user_info"=>array(
                                                    "user_id"=>$email->remote_source_id,
                                                    "kind"=>"google",
                                                    "first_name"=>$email->first_name,
                                                    "last_name"=>$email->last_name,
                                                    "gender"=>$email->gender,
                                                    "introduce"=>""
                                                )
                                            )
                                    )
                                );
    }
}