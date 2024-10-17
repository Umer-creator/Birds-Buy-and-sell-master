<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $id = Auth::user()->id;
        $stores = Store::where('seller_id', $id)->get();
        return view("admin.product.add-product", compact('categories', 'stores'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'category' => 'required',
            'store' => 'required',
            'slug' => 'required|unique:products|max:255',
            'images.*' => 'required|mimes:jpeg,png,gif,jpg',
            'image' => 'required|mimes:jpeg,png,gif,jpg',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->short_des = $request->short_des;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->status = true;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        if ($request->quantity > 0) {
            $product->stock_status = true;
        } else {
            $product->stock_status = false;
        }
        $product->category_id = $request->category;
        $product->store_id = $request->store;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = "uploads/product/" . time() . "." . $ext;
            $file->move('uploads\product', $filename);
            $product->image = $filename;
        }

        try {
            if ($request->hasFile('images')) {
                $images = [];
                foreach ($request->file('images') as $image) {
                    $ext = $image->getClientOriginalExtension();
                    $nam = $image->getClientOriginalName();
                    $filename = "uploads/product/" . $nam . time() . "." . $ext;
                    $image->move('uploads\product', $filename);
                    $images[] = $filename;
                }
                $product->images = json_encode($images);
            }
        } catch (\Throwable $th) {
            $product->images = null;
        }

        try {
            $product->save();
            return redirect()->back()->with('success', 'Product created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to create product' . $th);
        }
    }

    public function getAdminStoreProduct()

    {

        $user = User::find(Auth::user()->id);
        if ($user->store) {
            $products = Product::where("store_id", $user->store->id)->get();
        } else {
            $products = [];
        }
        return view('admin.product.view-products', compact('products'));
    }


    public function getStoresProducts()
    {
        $user = User::find(Auth::user()->id);


        if ($user->store) {
            $products = Product::where("store_id", "!=", $user->store->id)->get();
        } else {
            $products = Product::all();
        }

        return view("admin.product.view-stores-products", compact('products'));
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view("admin.product.edit-product", compact('product'));
    }



    public function editproduct($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $stores = Store::where("seller_id", Auth::user()->id)->get();
        return view("admin.product.edit-admin-product", compact("product", "categories", "stores"));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'category' => 'required',
            'store' => 'required',
            'slug' => 'required|unique:products,slug,' . $id,
            'images.*' => 'required|mimes:jpeg,png,gif,jpg',
            'image' => 'required|mimes:jpeg,png,gif,jpg',
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->short_des = $request->short_des;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->stock_status = true;
        $product->status = true;
        $product->category_id = $request->category;
        $product->store_id = $request->store;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = "uploads/product/" . time() . "." . $ext;
            $file->move('uploads\product', $filename);
            $product->image = $filename;
        }

        try {
            if ($request->hasFile('images')) {
                $images = [];
                foreach ($request->file('images') as $image) {
                    $ext = $image->getClientOriginalExtension();
                    $nam = $image->getClientOriginalName();
                    $filename = "uploads/product/" . $nam . time() . "." . $ext;
                    $image->move('uploads\product', $filename);
                    $images[] = $filename;
                }
                $product->images = json_encode($images);
            }
        } catch (\Throwable $th) {
            $product->images = null;
        }

        try {
            $product->update();
            return redirect()->back()->with('success', 'Product update successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to supdate product' . $th);
        }
    }
    public function update(Request $request)
    {
        $product = Product::find($request->product_id);

        $product->featured = $request->featured;
        $product->status = $request->status;

        try {
            $product->update();
            return  response()->json(['status' => 'updated']);
        } catch (\Throwable $th) {
            return  response()->json(['status' => 'fail to update']);
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
