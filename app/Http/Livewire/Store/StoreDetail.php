<?php

namespace App\Http\Livewire\Store;

use App\Models\Product;
use App\Models\Review;
use App\Models\Store;
use Illuminate\Http\Request;
use Livewire\Component;


class StoreDetail extends Component
{
    public $slug;
    public $store_data;
    public $store_id;


    public function render(Request $request)
    {
        $this->slug = $request->slug;
        $this->store_data = Store::where('slug', $this->slug)->get();
        $this->store_id = $this->store_data['0']->id;
        $products = Product::where('store_id', $this->store_id)->get();


        return view('livewire.store.store-detail', ['products' => $products]);
    }
}
