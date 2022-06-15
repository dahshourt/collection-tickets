<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Factories\Categories\CategoryFactory;

use App\Http\Requests\Categories\EditRequest;
use App\Http\Requests\Categories\StoreRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ValidatesRequests;
    private $model;

    function __construct(CategoryFactory $Category){
        
        $this->model = $Category::index();
        $this->view = 'categories';
        $view = 'categories';
        $route = 'categories';
        $title = 'Categories';
        $form_title = 'Category';
        view()->share(compact('view','route','title','form_title'));
        
    }

    public function index()
    {
        $collection = $this->model->getAll();
        return view("$this->view.index",compact('collection'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("$this->view.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        // $request->persist();
        $this->model->create($request->all());
        return redirect()->back()->with('status' , 'Created Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $row = $this->model->find($id);
        $show = "disabled";
        return view("$this->view.show",compact('row','show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = $this->model->find($id);
        return view("$this->view.edit",compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        // $request->persist($id);
        $this->model->update($request,$id);
        return redirect()->back()->with('status' , 'Upated Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $this->model->find($id)->delete();
            return response(['msg' => 'deleted', 'status' => 'success']);
            
        }
    }
    
    

}
