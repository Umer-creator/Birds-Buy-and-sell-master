<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {

        return view("user.dashboard");
    }

    public function user_profile()
    {
        return view("user.profile-edit");
    }

    public function account_setting()
    {
        return view("user.account-setting");
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
