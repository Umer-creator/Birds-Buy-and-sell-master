<?php

namespace App\Http\Livewire\Navbar;

use App\Models\Category;
use Livewire\Component;

class CategoriesDropdown extends Component
{
    public $categories;
    public $total_categories;

    public function render()
    {
        $categories = Category::all();
        $this->total_categories = count($categories);
        $this->categories = $categories;
        return view('livewire.navbar.categories-dropdown');
    }
}
