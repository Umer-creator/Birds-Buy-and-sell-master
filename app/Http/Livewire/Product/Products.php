<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use App\Models\Store;
use Livewire\WithPagination;

class Products extends Component
{

    use WithPagination;
    public $products;
    public $categories;
    public $stores;
    public $search = '';
    public $sort = "none";


    public function mount($id = null, $type = null)
    {
        if ($id && $type) {
            if ($type == "category") {
                $this->products = Product::where('category_id', $id)->get();
            } else if ($type == "store") {
                $this->products = Product::where('store_id', $id)->get();
            } else if ($type == null) {
                $this->products = Product::all();
            }
        } else if ($type == null) {
            $this->products = Product::all();
        }
    }


    public function category_filter($id)
    {
        $this->products = Product::where('category_id', $id)->get();
    }

    public function store_filter($id)
    {
        $this->products = Product::where('store_id', $id)->get();
    }

    public function clear_filter()
    {
        $this->products = Product::all();
        $this->sort = "none";
        $this->search = '';
    }
    public function sortBy($sort)
    {
        $this->sort = $sort;
        $this->products = Product::orderBy($sort, 'asc')->get();
    }

    public function render()
    {
        // $products = Product::paginate(12);
        if ($this->search != '') {
            $this->products = Product::where('name', 'like', '%' . $this->search . '%')->get();
        }
        $this->stores = Store::all();
        $this->categories = Category::all();

        return view('livewire.product.products');
    }
}
