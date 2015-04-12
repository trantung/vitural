<?php namespace Vitural;
use Prototype\Forms\Admin\LoginForm;
use Prototype\Forms\Admin\EditForm;
use Prototype\Forms\Admin\BossEditForm;
use Prototype\Forms\Admin\BossEmailForm;
use Prototype\Forms\Admin\SearchForm;
use Prototype\Forms\Admin\AdminEditForm;
use Prototype\Forms\Admin\EmailFormAdd;
class VituralController extends CommonController {
    public function __construct(
        LoginForm $loginForm,
        EditForm $editForm,
        BossEditForm $bossEditForm,
        BossEmailForm $bossEmailForm,
        SearchForm $searchForm,
        AdminEditForm $adminEditForm,
        EmailFormAdd $emailFormAdd
        )
    {
        $this->loginForm = $loginForm;
        $this->editForm = $editForm;
        $this->bossEditForm = $bossEditForm;
        $this->bossEmailForm = $bossEmailForm;
        $this->searchForm = $searchForm;
        $this->adminEditForm = $adminEditForm;
        $this->emailFormAdd = $emailFormAdd;
        $this->beforeFilter('employee', array('except'=>array('getLogin','postLogin','lo')));
        $this->beforeFilter('admin', array('only'=>array(
                                                    'bossTop','bossSearch',
                                                    'bossSearchDetail','employeeDetail','employeeEditDetail','employeeEditDetailConfirm',
                                                    'employeeGetEditDetailConfirm','employeeEditDetailComplete','employeeGetDeleteConfirm',
                                                    'employeeDeleteConfirm','employeeDeleteComplete','add','addConfirm','addComplete',
                                                    'adminTop'
                                                    )));
        $this->beforeFilter('@returnUsernameHeader',array('except' =>array('getLogin','postLogin','logout')));
    }

    public function returnUsernameHeader()
    {
        $name = \User::find(\Auth::user()->id)->name;
        \View::share(compact('name'));
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
        $user_own = \User::find($boss_id);
        $list_users = \User::where('manager_id',$boss_id)->where('role_id','=',EMPLOY)->paginate(PAGINATE);
        return \View::make('admin.top')->with(compact('list_users','user_own'));
    }
    public function bossSearch()
    {
        $boss_id = \Auth::user()->id;
        $user_own = \User::find($boss_id);
        $role_id = \Auth::user()->role_id;
        return \View::make('boss.search')->with(compact('role_id','user_own'));
    }
    public function bossSearchDetail()
    {
        $input = \Input::all();
        $boss_id = \Auth::user()->id;
        $user_own = \User::find($boss_id);
        $this->searchForm->validateDates()->validate($input, NULL);
        // $this->searchForm->validate($input, NULL);
        $search = $this->commonSearch('users',$input);
        $search = $search->paginate(PAGINATE);
        $list_users = $search;
        return \View::make('boss.searchdetail')->with(compact('list_users','user_own'));

    }
    public function employeeDetail($id)
    {
        $user_detail = \User::find($id);
        $user_id = \Auth::user()->id;
        $user_own = \User::find($user_id);
        $comment = \Comment::where('user_id',$id)->first();
        $boss = \User::find($user_detail->manager_id);
        return \View::make('employee.detail')->with(compact('user_detail','comment','user_own','boss'));
    }
    public function employeeEditDetail($id)
    {
        $user_detail = \User::find($id);
        $user_id =\Auth::user()->id;
        $role_id = \User::find($user_id)->role_id;
        $list_boss = \User::where('role_id',BOSS)->get();
        $comment = \Comment::where('user_id',$id)->first();
        return \View::make('boss.editemp')->with(compact('id','user_detail','comment','role_id','list_boss'));

    }
    public function employeeEditDetailConfirm($id)
    {
        $input = \Input::all();
        if($input['email'] !=  \User::find($id)->email){
            $this->bossEmailForm->validate($input, NULL);
        }
        $input['content'] = $input['note'];
        unset($input['note']);
        if(isset($input['roll'])){
            if($input['roll'] == ADMIN||$input['roll'] == BOSS){
                $this->bossEditForm->validate($input, NULL);
            }
            else{
                $this->adminEditForm->validate($input, NULL);
            }
        }
        $this->bossEditForm->validate($input, NULL);
        return \View::make('boss.editconfirm')->with(compact('input','id'));

    }
    public function employeeEditDetailComplete($id)
    {
        $input = \Input::all();
        $user_id = \Auth::user()->id;
        $user_check = \User::find($user_id)->role_id;
        $role_id = \User::find($id)->role_id;
        if($user_check == ADMIN){
            if($role_id == EMPLOY){
                if($input['roll'] == EMPLOY){
                    $this->updateUserIntoDB($input, $id, 'users');
                    $this->updateCommentUser($input, $id);
                }
                if($input['roll'] == BOSS){
                    $update = $this->commonUpdateUser($input);
                    $update['password'] = \Hash::make($input['password']);
                    \Common::updateDB('users', $id, array('role_id'=>BOSS));
                }
                if($input['roll'] == ADMIN){
                    $this->updateUserIsAdmin($input,$id,'users');
                }
            }
            if($role_id == BOSS){
                if($input['roll'] == EMPLOY){
                    $this->updateUserIntoDB($input, $id, 'users');
                    $comment['user_id'] = $id;
                    $comment['content'] = $input['content'];
                    \Common::createComment($comment);
                }
                if($input['roll'] == BOSS){
                    $this->updateUserIntoDB($input, $id, 'users');                
                }
                if($input['roll'] == ADMIN){
                    $this->updateUserIsAdmin($input,$id,'users');
                }
            }
        }
        if($user_check == BOSS){
            $this->updateUserIntoDB($input, $id, 'users');
            $this->updateCommentUser($input, $id);
        }
        return \View::make('boss.editcomp')->with(compact('id'));

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
        $comment = \Comment::where('user_id',$id)->first();
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
        $create_user['email_conf'] = $input['email_conf'];
        $this->emailFormAdd->validateDates()->validate($create_user, NULL);
        return \View::make('boss.addconf')->with(compact('input'));
    }
    public function addComplete()
    {
        $input = array();
        $comment = array();
        $input = \Input::all();
        $input['role_id'] = $this->getRoleId($input);
        $input['manager_id'] = $this->getMangerId($input);
        $user_id = \Common::createUser($input);
        $comment['user_id'] = $user_id;
        $comment['content'] = $input['note'];
        \Common::createComment($comment);
        return \View::make('boss.addcomp')->with(compact('user_id'));
    }
    public function adminTop()
    {
        $admin_id = \Auth::user()->id;
        $user_own = \User::find($admin_id);
        $list_users = \User::where('role_id','!=',ADMIN)->paginate(PAGINATE);
        return \View::make('admin.top')->with(compact('list_users','user_own'));
    }
    public function adminSearchDetail()
    {
        $input = \Input::all();
        $admin_id = \Auth::user()->id;
        $user_own = \User::find($admin_id);
        $this->searchForm->validateDates()->validate($input, NULL);
        $search = $this->commonSearch('users',$input);
        if(isset($input['admin']))
        {
            $search = $search->where('role_id',ADMIN);
        }
        if(isset($input['boss']))
        {
            $search = $search->where('manager_id',$admin_id)->where('role_id',BOSS);
        }
        if(isset($input['employee']))
        {
            $search = $search->where('role_id',EMPLOY);
        }
        $search = $search->paginate(PAGINATE);
        $list_users = $search;
        return \View::make('boss.searchdetail')->with(compact('list_users','user_own'));
    }

}
