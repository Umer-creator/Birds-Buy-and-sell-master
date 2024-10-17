<?php

namespace App\Http\Livewire\Home;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $products;
    public function render()
    {

        $this->products = Product::limit(10)->get();
        return view('livewire.home.products');
    }
}
