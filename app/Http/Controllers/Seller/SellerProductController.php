<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use Auth;

class SellerProductController extends Controller
{
    //
    public function view()
    {
        // $products = Product::where("store")
        $storeId = Auth::user()->store->id;
        $products = Product::where("store_id", "=", $storeId)->get();
        return view("seller.product.seller-view-products", compact("products"));
    }
    public function viewAdd()
    {
        $categories = Category::all();
        $stores = Store::where('seller_id', Auth::user()->id)->get();
        return view("seller.product.seller-add-product", compact('categories', 'stores'));
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
        $product->quantity = $request->quantity;
        $product->stock_status = true;
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
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $stores = Store::where("seller_id", Auth::user()->id)->get();
        return view("seller.product.seller-edit-product", compact("product", "categories", "stores"));
    }

    public function productDetail($id)
    {
        $product = Product::find($id);
        return view("seller.product.seller-product-detail", compact("product"));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'category' => 'required',
            'store' => 'required',
            'slug' => 'required|unique:products,slug,' . $id,
            'images.*' => 'required|mimes:jpeg,png,gif,jpg',
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
        $product->status = false;
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
            return redirect()->back()->with('success', 'Product updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to update product' . $th);
        }
    }


    public function delete($id)
    {
        if ($id) {
            $product = Product::find($id);
            if ($product) {
                $product->delete();
                return redirect()->back()->with('success', 'Product deleted successfully');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
