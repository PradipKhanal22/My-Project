<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
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
                'product_name' => $order->product->name,
                'price' => $order->price,
                'payment_method' => $order->payment_method,
            ];
            $product = Product::find($order->product_id);
            $product->stock = $product->stock - $order->quantity;
            $product->save();

            Mail::send('emails.orderemail', $emaildata, function ($message) use ($order) {
                $message->to($order->user->email, $order->user->name)->subject('Order Notification');
            });
            return redirect('/')->with('success', 'Order has been placed successfully');
        }
    }

   public function orderHistory()
    {
        $user = Auth::user(); // Get the authenticated user
        $orders = Order::where('user_id', $user->id)
            ->with('product') // Include the product details in the query
            ->latest()
            ->get(); // Fetch orders for the user

        return view('purchased_history', compact('orders')); // Pass orders to the view
    }

    public function cancel($orderId)
    {
        // Retrieve the order by its ID
        $order = Order::findOrFail($orderId);

        // Check if the order belongs to the authenticated user
        if ($order->user_id != auth()->user()->id) {
            return redirect()->route('user.bookingHistory')->with('error', 'You are not authorized to cancel this order.');
        }

        // Check if the cancellation is within 2 days of the order
        $orderDate = Carbon::parse($order->created_at);
        $currentDate = Carbon::now();
        $diffInDays = $orderDate->diffInDays($currentDate);

        if ($diffInDays <= 2) {
            // Prepare email data for cancellation notification
            $emailData = [
                'name' => $order->user->name,
                'status' => 'Cancelled',
                'order' => $order,
                'product' => $order->product,
                'payment_method' => $order->payment_method,
            ];
            // Delete the order from the database
            $order->delete();

            return redirect()->route('user.orderHistory')->with('success', 'Your order has been successfully cancelled.');
         } else {
            return redirect()->route('user.orderHistory')->with('error', 'Orders can only be cancelled within 2 days of placement.');
        }
    }

}
