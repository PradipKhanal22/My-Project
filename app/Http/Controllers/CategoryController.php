<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderby('priority')->get();
        return view('categories.index',compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(request$request)
    {
        $data = $request ->validate([
            'name'=>'required | unique:categories,name | string',
            Rule::unique('categories','name')->where(function($query) use ($request){
                return $query->whereRaw('LOWER(name) = ?' [strtolower($request()->name)]);
            }),
            'priority'=>'required | integer'
        ]);
        //create slog
        // $slog = strtolower(str_replace(' ','-',$data['name']));
        Category::create($data);
        return redirect()->route('categories.index')->with('success','Category Created Successfully.');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit',compact(('category')));
    }
    public function update(Request $request,$id)
    {
        $data=$request->validate([
            'name'=>'required | string',
            'priority'=>'required | integer'
        ]);
        $category=Category::find($id);
        $category->update($data);
        return redirect()->route('categories.index')->with('success','Category Updated Successfully.');
    }
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index')->with('success','Category Deleted Successfully.');
    }
}

