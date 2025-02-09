<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::latest()->get();
        return view('welcome',compact('products'));
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function contactinfo()
    {
        return view('contactinfo');
    }

    public function categoryproduct($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id',$id)->get();
        return view('categoryproduct',compact('products','category'));
    }
    public function viewproduct($id)
    {
      $product = Product::find($id);
      $relatedproducts = Product::where('category_id',$product->category_id)->where('id','!=',$id)
      ->limit(4)->get();
      $reviews = $product->reviews()->latest()->take(3)->get();
      return view('viewproduct',compact('product','relatedproducts','reviews'));
    }
    public function search(Request $request)
    {
        $qry = $request->qry;
        $products = Product::where('name','like','%'.$qry.'%')->get();
        return view('search',compact('products','qry'));
    }
    public function product()
    {
        $products = Product::all();
        return view('product',compact('products'));
    }

}
