<?php

namespace App\Http\Repository\Users;
use App\Contracts\Users\UserRepositoryInterface;
use App\Http\Requests\users\UserRequest;
use App\Models\Group;
// declare Entities
use App\Models\User;
use App\Models\user_group;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
public function index(){

   return User::with('groups')->get();
   
   
      ;
}

    public function get_all_users()
    {
        return User::all();
    }

    public function create_user(){}
	public function store_user($request){
       
        $user=new User();
        $user->user_name=$request->user_name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        if(empty($request->phone))
        {
         $user->phone=''; 
        }else{
         $user->phone=$request->phone;
        }
        if(empty($request->active))
        {
         $user->active='0'; 
        }else{
         $user->active=$request->active;
        }
       
        $user->ip_address=$request->ip();
        $user->save();
        foreach( $request->groups as $gr){
            $gp=new user_group();
			$gp->group_id=$gr;
			$gp->user_id=$user->id;
			$gp->save();

        }
 
    }

    public function update(User $user,Request $request){

$user->user_name=$request->user_name;
        $user->email=$request->email;
        if(!empty($request->password))
        {
            $user->password=Hash::make($request->password);
        }
     
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        if(empty($request->phone))
        {
         $user->phone=''; 
        }else{
         $user->phone=$request->phone;
        }
        if(empty($request->active))
        {
         $user->active='0'; 
        }else{
         $user->active=$request->active;
        }
       
        $user->ip_address=$request->ip();
        $user->save();
        $user->groups()->sync($request->groups);

          

        
     

    }

	}



