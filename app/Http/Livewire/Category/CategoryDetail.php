<?php

namespace App\Http\Livewire\Category;

use App\Models\Product;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;

class CategoryDetail extends Component
{

    public $slug;
    public $category_data;
    public $category_id;


    public function render(Request $request)
    {
        $this->slug = $request->slug;
        $this->category_data = Category::where('slug', $this->slug)->get();
        $this->category_id = $this->category_data['0']->id;
        $products = Product::where('category_id', $this->category_id)->get();
        return view('livewire.category.category-detail', ['products' => $products]);
    }
}
