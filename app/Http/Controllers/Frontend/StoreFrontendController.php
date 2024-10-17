<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreFrontendController extends Controller
{
    public function  index()
    {
        return view("frontend.store.view-stores");
    }
    public function store_detail($slug)
    {
        $store = Store::where('slug', $slug)->where("approved", 1)->first();

        if (!$store) {
            return redirect()->route('error.404')
                ->with('error', 'The requested store does not exist.');
        }
        return view('frontend.store.storeDetail', compact("store"));
    }
}
