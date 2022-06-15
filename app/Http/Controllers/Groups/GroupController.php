<?php

namespace App\Http\Controllers\Groups;

use App\Factories\Groups\GroupFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\groups\StoreRequest;
use App\Http\Requests\groups\updateRequest;
use App\Models\group;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    use ValidatesRequests;
    private $model;

    function __construct(GroupFactory $Category){
        
        $this->model = $Category::index();
        $this->view = 'users';
        $view = 'groups';
        $route = 'users';
        $title = 'groups';
        $form_title = 'groups';
        view()->share(compact('view','route','title','form_title'));
        
    }
    public function edit(Group $group){
       
        return view('groups.edit',compact('group'));
    }

    public function index(){
        $groups=$this->model->index();
        return view('groups.index',compact('groups'));
    }

    public function create_group(){

        return view('groups.create');
    }
    public function store_group(StoreRequest $request){
      
           
        $this->model->store_group($request);
        return redirect()->route('groups.create_group')->with('success','group added successfully');

    }

    public function assign_user_group(){
        $title = 'assign users groups';
        $form_title = 'assign users groups';
        $groups=Group::latest()->get();
        $user=User::latest('id')->first();
        

        return view('groups.assign_users_groups',compact('title','form_title','groups','user'));
    }
public function update(Group $group,updateRequest $request){
    $this->model->update($group,$request);

    return redirect()->route('groups.index')->with('status' , 'Upated Successfully' );

}





}
