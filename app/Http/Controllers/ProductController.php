<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\PurchaseHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::orderBy('priority')->get();
        return view('products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required | string',
            'stock' => 'required | integer',
            'description' => 'required',
            'photopath' => 'required | image',

        ]);
        $photoname = time() . '.' . $request->photopath->extension();
        $request->photopath->move(public_path('images'), $photoname);
        $data['photopath'] = $photoname;

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product Created Successfully.');
    }
    public function edit($id)
    {
        $categories = Category::orderBy('priority')->get();
        $product = Product::find($id);
        return view('products.edit', compact('categories', 'product'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required | string',
            'stock' => 'required | integer',
            'description' => 'required',
        ]);
        $product = Product::find($id);
        if ($request->hasFile(('photopath'))) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);
            $data['photopath'] = $photoname;
            // Delete old photo
            $oldphoto = public_path('images' . '/' . $product->photopath);
            if (file_exists(($oldphoto))) {
                unlink(($oldphoto));
            }
        }
        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Product Updated Successfully.');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $photo = public_path('images') . '/' . $product->photopath;
        if (file_exists(($photo))) {
            unlink(($photo));
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully.');
    }

    public function storePurchase(Request $request)
    {
        // Validate purchase details (e.g., product_id, quantity, etc.)
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $user = Auth::user();
        $totalPrice = $product->price * $validated['quantity'];

        // Log purchase history
        PurchaseHistory::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'price' => $totalPrice,
            'purchased_at' => now(),
        ]);

        // Additional logic for completing the purchase, like deducting stock, etc.
    }

    public function viewPurchaseHistory()
    {
        $user = Auth::user();
        $purchaseHistory = PurchaseHistory::where('user_id', $user->id)->with('product')->orderBy('purchased_at', 'desc')->get();
        return view('purchase_history', compact('purchaseHistory'));
    }
    public function purchase_index()
    {
        $user = Auth::user();
        $purchaseHistory = PurchaseHistory::where('user_id', $user->id)->with('product')->orderBy('purchased_at', 'desc')->get();
        return view('purchased_history');
    }
}
