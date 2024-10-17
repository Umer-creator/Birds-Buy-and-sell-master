<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.home.categories');
    }
}
