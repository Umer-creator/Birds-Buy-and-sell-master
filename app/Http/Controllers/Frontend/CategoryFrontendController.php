<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryFrontendController extends Controller
{

    public function category_detail($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            return redirect()->route('error.404')
                ->with('error', 'The requested store does not exist.');
        }
        return view("frontend.category.view-category", compact("category"));
    }
}
