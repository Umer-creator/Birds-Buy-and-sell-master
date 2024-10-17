<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\StoreTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $categories = Category::all()->count();
        $products = Product::all()->count();
        $noTcompletedOrders = Order::where("order_status", 0)->count();



        return view("admin.dashboard", compact("users", "categories", "products", "noTcompletedOrders"));
    }
    public function account()
    {
        return view("admin.account.setting");
    }
    public function profile()
    {
        return view("admin.account.profile-edit");
    }
    public function profile_update(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg',
        ]);
        $user = User::find(Auth::user()->id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = "uploads/profile/" . time() . "." . $ext;
            $file->move('uploads\profile', $filename);
            $user->profile_photo_path = $filename;
        }
        try {
            $user->update();
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to update profile');
        }
    }
}
