<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\Product;

class FeaturedProduct extends Component
{
    public $featured_products;


    public function render()
    {

        $this->featured_products = Product::where('featured', 1)->get();
        return view('livewire.home.featured-product');
    }
}
