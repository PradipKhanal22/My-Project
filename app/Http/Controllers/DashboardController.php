<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $totalproduct = Product::count();
        $totalcategories = Category::count();
        $totalorders = Order::count();
        $totalusers = User::count();
        $deliveredorders = Order::where('status','Delivered')->count();
        $pendingorders = Order::where('status','Pending')->count();
        $totalreviews = Review::count();

        // For Category wise Products
        $allcategories = Category::all();
        $categoryproduct = [];
        foreach($allcategories as $category)
        {
            $categoryproduct[] = Product::where('category_id',$category->id)->count();
        }
        $allcategories = $allcategories->pluck('name')->toArray();

        // For Orders
        $date = \Carbon\Carbon::today()->subDays(90);
        $orderdates = Order::where('created_at', '>=', $date)->pluck('created_at')->toArray();
        $orderdates = array_map(function($date){
            return date('Y-m-d', strtotime($date));
        },$orderdates);
        $orderdates = array_unique($orderdates);
        $ordercount = [];
        foreach($orderdates as $orderdate)
        {
            $ordercount[] = Order::whereDate('created_at',$orderdate)->count();
        }
        $orderdates = json_encode(array_values($orderdates));
        $ordercount = json_encode(array_values($ordercount));

        // For Products
        $date = \Carbon\Carbon::today()->subDays(30);
        $productdates = Product::where('created_at', '>=', $date)->pluck('created_at')->toArray();
        $productdates = array_map(function($date){
            return date('Y-m-d', strtotime($date));
        },$productdates);
        $productdates = array_unique($productdates);
        $productcount = [];
        foreach($productdates as $productdate)
        {
            $productcount[] = Product::whereDate('created_at',$productdate)->count();
        }
        $productdates = json_encode(array_values($productdates));
        $productcount = json_encode(array_values($productcount));

        return view('dashboard',compact('totalproduct','totalcategories','totalorders','totalusers','deliveredorders','pendingorders','totalreviews','allcategories','categoryproduct','orderdates','ordercount','productdates','productcount'));
    }
    
}
