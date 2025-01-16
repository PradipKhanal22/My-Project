<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id'=> 'required',
            'quantity' => 'required | integer'
        ]);
        $data['user_id'] = auth()->user()->id;
        $check = Cart::where('user_id',$data['user_id'])->where('product_id',$data['product_id'])->count();
        if($check>0)
        {
            return back()->with('error','Product Already in Cart');
        }
        Cart::create($data);
        return back()->with('success','Product Added to Cart Successfully');
    }
    public function mycart()
    {
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        foreach($carts as $cart)
        {
            if($cart->product->stock < $cart->quantity)
            {
                Cart::find($cart->product_id)->update(['quantity'=>$cart->product->stock]);
            }
        }

        return view('cart',compact('carts'));
    }
    public function destroy(Request $request)
    {
        Cart::find($request->dataid)->delete();
        return back()->with('success','Product Removed from Cart Successfully');
    }
    public function checkout($id)
    {
        $cart=Cart::find($id);
        if($cart->user_id != auth()->user()->id)
        {
            return back()->with('error','Unauthorized Access');
        }
        return view('checkout',compact('cart'));
    }
    public function addToCart(Request $request)
    {
        // Assume $productId is passed from the request
        $productId = $request->input('product_id');

        // Logic to add the product to the cart (using session as an example)
        $cart = session()->get('cart', []);
        $cart[$productId] = isset($cart[$productId]) ? $cart[$productId] + 1 : 1;
        session()->put('cart', $cart);

        // Flash a success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

}
