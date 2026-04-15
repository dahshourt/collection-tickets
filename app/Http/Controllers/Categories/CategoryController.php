<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\traits\LogsActivity;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Factories\Categories\CategoryFactory;
use App\Http\Requests\Categories\EditRequest;
use App\Http\Requests\Categories\StoreRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ValidatesRequests, LogsActivity;

    private $model;

    function __construct(CategoryFactory $Category)
    {
        $this->model    = $Category::index();
        $this->view     = 'categories';
        $view           = 'categories';
        $route          = 'categories';
        $title          = 'Categories';
        $form_title     = 'Category';
        view()->share(compact('view', 'route', 'title', 'form_title'));
    }

    public function index()
    {
        $collection = $this->model->getAll();
        $this->writeLog('Category', 'Viewed categories (custom fields) list', 'View', 'Custom Fields');
        return view("$this->view.index", compact('collection'));
    }

    public function create()
    {
        return view("$this->view.create");
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->all());
        $this->writeLog(
            'Category',
            'Created custom field | ' . $this->formatRequestDetails($request->except('_token')),
            'Create',
            'Custom Fields'
        );
        return redirect()->back()->with('status', 'Created Successfully');
    }

    public function show($id)
    {
        $row  = $this->model->find($id);
        $show = 'disabled';
        $this->writeLog('Category', "Viewed custom field ID: {$id}", 'View', 'Custom Fields');
        return view("$this->view.show", compact('row', 'show'));
    }

    public function edit($id)
    {
        $row = $this->model->find($id);
        $this->writeLog('Category', "Opened edit form for custom field ID: {$id}", 'View', 'Custom Fields');
        return view("$this->view.edit", compact('row'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->model->update($request, $id);
        $this->writeLog(
            'Category',
            "Updated custom field ID: {$id} | " . $this->formatRequestDetails($request->except(['_token', '_method'])),
            'Update',
            'Custom Fields'
        );
        return redirect()->back()->with('status', 'Updated Successfully');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $row  = $this->model->find($id);
            $name = optional($row)->name ?? "ID {$id}";
            $this->model->find($id)->delete();
            $this->writeLog('Category', "Deleted custom field: {$name} (ID: {$id})", 'Delete', 'Custom Fields');
            return response(['msg' => 'deleted', 'status' => 'success']);
        }
    }
}
