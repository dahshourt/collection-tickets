<?php

namespace App\Http\Controllers\User;

use App\Factories\Users\UserFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\users\UpdateUserController;
use App\Http\Requests\users\UserRequest;
use App\Models\group;
use App\Models\User;
use App\Models\user_group;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ValidatesRequests;
    private $model;

    function __construct(UserFactory $Category){
        
        $this->model = $Category::index();
        $this->view = 'users';
        $view = 'user';
        $route = 'users';
        $title = 'users';
        $form_title = 'Users';
        view()->share(compact('view','route','title','form_title'));
        
    }

    public function create_user(){
        $groups=Group::latest()->get();

        return view('user.create',compact('groups'));

    }
    public function index(){
        $users=$this->model->index();
        return view('user.index',compact('users'));
    }

    public function store_user(UserRequest $request){

       
        $this->model->store_user($request);

      
       return redirect()->route('users.index');
    }
    public function edit(User $user){
        
        $groups=Group::latest()->get();
        // dd($user->UserGroups->pluck('group_id'));
        // $users_groups=user_group::where('user_id',$user->id)->get();;
        return view('user.edit',compact('groups','user'));
    }
    public function update(User $user ,UpdateUserController $request){

            $this->model->update($user,$request);

            return redirect()->route('users.index')->with('status' , 'Upated Successfully' );


    }



}
