<?php namespace Vitural;
use Prototype\Forms\Admin\LoginForm;
use Prototype\Forms\Admin\EditForm;
use Prototype\Forms\Admin\BossEditForm;
use Prototype\Forms\Admin\BossEmailForm;
class VituralController extends CommonController {
    public function __construct(
        LoginForm $loginForm,
        EditForm $editForm,
        BossEditForm $bossEditForm,
        BossEmailForm $bossEmailForm
        )
    {
        $this->loginForm = $loginForm;
        $this->editForm = $editForm;
        $this->bossEditForm = $bossEditForm;
        $this->bossEmailForm = $bossEmailForm;
        $this->beforeFilter('employee', array('except'=>array('getLogin','postLogin')));
        $this->beforeFilter('admin', array('only'=>array(
                                                    'bossTop','bossSearch',
                                                    'bossSearchDetail','employeeDetail','employeeEditDetail','employeeEditDetailConfirm',
                                                    'employeeGetEditDetailConfirm','employeeEditDetailComplete','employeeGetDeleteConfirm',
                                                    'employeeDeleteConfirm','employeeDeleteComplete','add','addConfirm','addComplete',
                                                    'adminTop'
                                                    )));
    }


    public function getLogin()
    {
        return \View::make('vitural.login');
    }

    public function postLogin()
    {
        $input = \Input::all();
        $this->loginForm->validate($input, NULL);
        if (\Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) 
        {   
            $role_id = \Auth::user()->role_id;
            if($role_id == EMPLOY){
                return \Redirect::route('employee.top');
            }
            if($role_id == BOSS){
                return \Redirect::route('boss.top');
            }
            if($role_id == ADMIN){
                return \Redirect::route('admin.top');
            }

        }
        $email_error =  EMAIL_PASSWORD_ERROR;
        return \View::make('vitural.login')->with(compact('email_error'));
    }
    public function employeeTop()
    {
        $user_id = \Auth::user()->id;
        $user_detail = \User::find($user_id);
        return \View::make('employee.top')->with(compact('user_detail'));;
    }

    public function employeeEdit($id)
    {
        $user_detail = \User::find($id);
        return \View::make('employee.edit')->with(compact('user_detail'));
    }
    public function employeeConfirm($id)
    {
        $input = \Input::all();
        $this->editForm->validate($input, NULL);
        $update = array();
        $update = $this->commonUpdateUser($input);
        \Common::updateDB('users', $id, $update);
        return \View::make('employee.editconfirm')->with(compact('id','input'));
    }
    public function employeeGetConfirm($id)
    {
        $input = array();
        $user_detail = \User::find($id);
        $input = $this->commonReturnInputUser($user_detail);
        return \View::make('employee.editconfirm')->with(compact('id','input'));
    }

    public function employeeComplete($id)
    {
        return \View::make('employee.editcomplete')->with(compact('id'));
    }
    public function logout()
    {
        \Auth::logout();
        return \View::make('employee.logout');
    }
    
    public function bossTop()
    {
        $boss_id = \Auth::user()->id;
        $list_users = \User::where('manager_id',$boss_id)->where('role_id','=',EMPLOY)->get()->toArray();
        return \View::make('boss.top')->with(compact('list_users'));
    }
    public function bossSearch()
    {
        $boss_id = \Auth::user()->id;
        return \View::make('boss.search');
    }
    public function bossSearchDetail()
    {
        $input = \Input::all();
        $search = \DB::table('users');
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
        $search = $search->get();
        
        return \View::make('boss.searchdetail')->with(compact('search'));

    }
    public function employeeDetail($id)
    {
        $user_detail = \User::find($id);
        $boss_id = \Auth::user()->id;
        $boss = \User::find($boss_id);
        $comment = \Comment::where('user_id',$id)->first();
        return \View::make('employee.detail')->with(compact('user_detail','comment','boss'));
    }
    public function employeeEditDetail($id)
    {
        $user_detail = \User::find($id);
        $comment = \Comment::where('user_id',$id)->first();
        return \View::make('boss.editemp')->with(compact('id','user_detail','comment'));

    }
    public function employeeEditDetailConfirm($id)
    {
        $input = \Input::all();
        $update= array();
        if($input['email'] !=  \User::find($id)->email){
            $this->bossEmailForm->validate($input, NULL);
        }
        $update = $this->commonUpdateUser($input);
        $update['content']= $input['note'];
        $update['password']= $input['password'];
        $this->bossEditForm->validate($update, NULL);
        unset( $update['content']);
        $update['password'] = \Hash::make($input['password']);
        \Common::updateDB('users', $id, $update);
        $update_comment['content'] = $input['note'];
        $comment_id = \Comment::where('user_id',$id)->first()->id;
        \Common::updateDB('comments', $comment_id, $update_comment);
        $user_detail = \User::find($id);
        return \View::make('boss.editconfirm')->with(compact('user_detail','input'));

    }
    public function employeeEditDetailComplete($id)
    {
        $user_detail = \User::find($id);
        $comment = \Comment::where('user_id',$id)->first()->content;
        return \View::make('boss.editcomp')->with(compact('user_detail','comment'));

    }
    public function employeeGetEditDetailConfirm($id)
    {
        $input = array();
        $user_detail = \User::find($id);
        $input = $this->commonReturnInputUser($user_detail);
        $input['email'] = $user_detail->email;
        $comment = \Comment::where('user_id',$id)->first()->content;
        $input['note'] = $comment;
        $input['roll'] = $user_detail->manager_id;
        return \View::make('boss.editconfirm')->with(compact('user_detail','input'));
    }

    public function employeeGetDeleteConfirm($id)
    {
        $user_detail = \User::find($id);
        $comment = \Comment::where('user_id',$id)->first()->content;
        return \View::make('employee.delete')->with(compact('user_detail','comment'));
    }

    public function employeeDeleteConfirm($id)
    {
        \User::deleteLogicUser($id);
        return \View::make('employee.deletecomp');
    }

    public function employeeDeleteComplete($id)
    {
        return \View::make('employee.deletecomp');
    }
    public function add()
    {
        return \View::make('boss.add');
    }
    public function addConfirm()
    {
        $input = \Input::all();
        $create_user = array();
        $create_user = $this->commonUpdateUser($input);
        $create_user['content']= $input['note'];
        $create_user['password']= $input['password'];
        $this->bossEditForm->validate($create_user, NULL);
        $create_user['password'] = \Hash::make($input['password']);
        if(\User::where('email',$input['email'] !=NULL)){
            $this->bossEmailForm->validate($input, NULL);
        }
        $create_user['manager_id'] = \Auth::user()->id;
        return \View::make('boss.addconf')->with(compact('input'));
    }
    public function addComplete()
    {
        $input = array();
        $comment = array();
        $input = \Input::all();
        $input['manager_id'] = \Auth::user()->id;
        $input['role_id'] = EMPLOY;
        $user_id = \Common::createUser($input);
        $comment['user_id'] = $user_id;
        $comment['content'] = $input['note'];
        \Common::createComment($comment);
        return \View::make('boss.addcomp')->with(compact('user_id'));
    }
    public function adminTop()
    {
        $admin_id = \Auth::user()->id;
        $admin = \User::find($admin_id);
        $admin_detail = \User::where('id','!=',$admin_id)->paginate(PAGINATE);
        return \View::make('admin.top')->with(compact('admin_detail','admin'));
    }

}
