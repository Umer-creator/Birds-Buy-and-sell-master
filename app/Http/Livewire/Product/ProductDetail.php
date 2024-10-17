<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\Review;
use Livewire\Component;
use Illuminate\Http\Request;

class ProductDetail extends Component
{
    public $slug;
    public $product_data;
    public $reviews;
    public $product_id;

    public function render(Request $request)
    {
        $this->slug = $request->slug;
        $this->product_data = Product::where('slug', $this->slug)->get();
        $this->product_id = $this->product_data['0']->id;
        $this->reviews = Review::where('product_id', $this->product_id)->get();
        return view('livewire.product.product-detail');
    }
}
