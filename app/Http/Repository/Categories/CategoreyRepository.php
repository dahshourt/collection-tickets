<?php

namespace App\Http\Repository\Categories;
use App\Contracts\Categories\CategoryRepositoryInterface;
use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;

class CategoreyRepository implements CategoryRepositoryInterface
{

    
    public function getAll()
    {
        //return Category::all();
        return Category::latest()->paginate(10);
    }

    public function create($request)
    {
        return Category::create($request);
    }

    public function delete($id)
    {
        return Category::destroy($id);
    }

    public function update($request, $id)
    {
        return Category::where('id', $id)->update($request->except('_token','_method','id'));
    }

    public function find($id)
    {
        return Category::find($id);
    }
   

  
}