<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
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
        return view('dashboard',compact('totalproduct','totalcategories','totalorders','totalusers','deliveredorders','pendingorders'));
    }
}
