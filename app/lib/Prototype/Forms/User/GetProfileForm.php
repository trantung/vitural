<?php
namespace Prototype\Forms\User;

class GetProfileForm extends BaseUserForm
{
    protected $rules = array(
                            'app-session-id'=> 'required',
                            'os'=> 'required',
                            );
    public function showProfile($session_id)
    {
        $user_id = \Login::where('session_id',$session_id)->first()->user_id;
        $user = \User::find($user_id);
        // $image_url = \PAttachment::where('model_name','User')->where('model_id',$user->id)->first();
        return \Response::json(array(
                                "code"=>0,
                                "message"=> null,
                                "data"=>array(
                                    "profile"=>array(
                                            "user_id"=>$user->id,      
                                            "kind"=>$user->remote_source,      
                                            "first_name"=>$user->first_name,      
                                            "last_name"=>$user->last_name,      
                                            "gender"=>$user->gender,      
                                            "introduce"=>$user->introduce,      
                                            "image_url"=>$user->image_url,            
                                            "dob"=>$user->dob,            
                                            "email"=>$user->email,            
                                            "phone"=>$user->phone,            
                                    ))
                            ));

    }
}
