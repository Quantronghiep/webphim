<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //keo tha dataTable
    public function resorting(Request $request){
        $data = $request->all();
        // dd($data);
        foreach($data['array_id'] as $key => $value){
            $category = Category::find($value);
            $category->position = $key ;
            $category->save();
        }
    }

    public function index()
    {
        $categories = Category::orderBy('position','ASC')->get();
        return view('admin.category.index',[
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    
    public function store(Request $request)
    {
        $params = $request->all();
        $category = new Category();
        $category->createCategory($params);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        return redirect('admin/category')->with('success','Create success!');
    }

   
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',[
            'category' => $category,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $params = $request->all();
        $category = new Category();
        $category->updateCategory($params,$id);
        return redirect('admin/category')->with('success','Update success!');

    }

    
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect('admin/category')->with('success','Delete success!');
    }
}
