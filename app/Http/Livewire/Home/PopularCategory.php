<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use Livewire\Component;

class PopularCategory extends Component
{

    public $popular_categories;

    public function render()
    {
        $this->popular_categories = Category::where('popular', 1)->get();
        return view('livewire.home.popular-category');
    }
}
