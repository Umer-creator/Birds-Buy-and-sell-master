<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductFrontendController extends Controller
{
    public function index($type = null, $name = null, $id = null)
    {
        if ($type && $name && $id) {
            if ($type == "category") {
                $category = Category::where('id', $id)->first();
                if ($category) {
                    $data = ['type' => $type, 'id' => $id];
                    return view("frontend.product.view-products", compact('data'));
                } else {
                    return redirect()->route('error.404')
                        ->with('error', 'The requested category does not exist.');
                }
            } else if ($type == "store") {
                $store = Store::where('id', $id)->first();
                if ($store) {
                    $data = ['type' => $type, 'id' => $id];
                    return view("frontend.product.view-products", compact('data'));
                } else {
                    return redirect()->route('error.404')
                        ->with('error', 'The requested store does not exist.');
                }
            }
        } else {
            return view("frontend.product.view-products");
        }
    }

    public function product_detail($slug)
    {
        $product = Product::where('slug', $slug)->first();


        if (!$product) {
            return redirect()->route('error.404')
                ->with('error', 'The requested product does not exist.');
        }

        return view("frontend.product.product-detail", compact('product'));
    }
}
