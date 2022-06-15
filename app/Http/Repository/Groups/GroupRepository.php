<?php


namespace App\Http\Repository\Groups;
use App\Contracts\Groups\GroupRepositoryInterface;

// declare Entities
use App\Models\group;
use Illuminate\Http\Request;

class GroupRepository implements GroupRepositoryInterface
{
    public function index(){

        return Group::latest()->get();
        
        
           ;
     }
public function update(Group $group,Request $request){
    $group->name=$request->name;
    $group->group_email=$request->group_email;
    if(empty($request->description))
    {
     $group->description=''; 
    }else{
     $group->description=$request->description;
    }

    if(empty($request->active))
    {
     $group->active='0'; 
    }else{
     $group->active=$request->active;
    }

    $group->save();

}
    public function get_all_Groups()
    {
        return Group::all();

    }
    public function store_group(Request $request){
        $group=new Group();
        $group->name=$request->name;
        $group->group_email=$request->group_email;
        if(empty($request->description))
        {
         $group->description=''; 
        }else{
         $group->description=$request->description;
        }

        if(empty($request->active))
        {
         $group->active='0'; 
        }else{
         $group->active=$request->active;
        }

        $group->save();
        
    }


	}



