<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'product_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $data['payment_method'] = 'COD';
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'Pending';
        Order::create($data);
        Cart::find($request->cart_id)->delete();
        $product = Product::find($data['product_id']);
        $product->stock = $product->stock - $data['quantity'];
        $product->save();
        return redirect('/')->with('success', 'Order has been placed successfully');
    }
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }
    public function status($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        $emaildata = [
            'name' => $order->user->name,
            'status' => $status,
            'product_name' => $order->product->name,
            'price' => $order->price,
            'payment_method' => $order->payment_method,
        ];
        Mail::send('emails.orderemail', $emaildata, function ($message) use ($order) {
            $message->to($order->user->email, $order->user->name)->subject('Order Notification');
        });
        return back()->with('success', 'Order is now ' . $status);
    }
    public function storeEsewa(Request $request, $cartid)
    {
        $data = $request->data;
        $data = base64_decode($data);
        $data = json_decode($data);
        $status = $data->status;
        if ($status === "COMPLETE") {
            $cart = Cart::find($cartid);
            $order = new Order();
            $order->product_id = $cart->product_id;
            $order->price = $cart->product->price;
            $order->quantity = $cart->quantity;
            $order->payment_method = "eSewa";
            $order->name = $cart->user->name;
            $order->phone = 'N/A';
            $order->address = 'N/A';
            $order->user_id = auth()->user()->id;
            $order->status = "Pending";
            $order->save();
            $cart->delete();
            $emaildata = [
                'name' => $order->user->name,
                'status' => $status,
            ];
            $product = Product::find($data['product_id']);
            $product->stock = $product->stock - $data->quantity;
            $product->save();

            Mail::send('emails.orderemail', $emaildata, function ($message) use ($order) {
                $message->to($order->user->email, $order->user->name)->subject('Order Notification');
            });
            return redirect('/')->with('success', 'Order has been placed successfully');
        }
    }

    public function historyindex()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->with('product')->get();
        return view('purchased_history', compact('orders'));
    }
}
