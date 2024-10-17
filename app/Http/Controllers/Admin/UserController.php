<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();
        $users = User::where('id', '!=', $currentUser->id)->get();
        return view("admin.user.view-users", compact('users'));
    }



    public function delete($id)
    {
        if ($id) {
            $user = User::find($id);
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
        } else {
            return redirect()->back();
        }
    }

    public function view($id)
    {
        $user = User::find($id);
        return view("admin.user.view-user", compact('user'));
    }
}
