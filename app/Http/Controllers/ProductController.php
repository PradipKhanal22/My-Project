<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }
    public function create()
    {
        $categories = Category::orderBy('priority')->get();
        return view('products.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $data = $request ->validate([
            'category_id' => 'required',
            'name'=>'required',
            'price' =>'required | string',
            'stock' =>'required | integer',
            'description' => 'required',
            'photopath' => 'required | image',

        ]);
        $photoname = time().'.'.$request -> photopath->extension();
        $request -> photopath-> move(public_path('images'),$photoname);
        $data['photopath'] = $photoname;

        Product::create($data);
        return redirect()->route('products.index')->with('success','Product Created Successfully.');
    }
    public function edit($id)
    {
        $categories = Category::orderBy('priority')->get();
        $product = Product::find($id);
        return view('products.edit',compact('categories','product'));
    }
    public function update(Request $request,$id)
    {
        $data=$request->validate([
            'category_id' => 'required',
            'name'=>'required',
            'price' =>'required | string',
            'stock' =>'required | integer',
            'description' => 'required',
        ]);
        $product = Product::find($id);
        if($request->hasFile(('photopath')))
        {
            $photoname = time().'.'.$request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);
            $data['photopath']= $photoname;
            // Delete old photo
            $oldphoto = public_path('images'.'/'.$product->photopath);
            if(file_exists(($oldphoto)))
            {
                unlink(($oldphoto));
            }
        }
        $product->update($data);
        return redirect()->route('products.index')->with('success','Product Updated Successfully.');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $photo = public_path('images').'/'.$product->photopath;
        if(file_exists(($photo)))
        {
            unlink(($photo));
        }

        $product->delete();
        return redirect()->route('products.index')->with('success','Product Deleted Successfully.');
    }

}
