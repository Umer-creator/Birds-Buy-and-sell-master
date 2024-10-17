<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function index()
    {
        return view("admin.category.add-category");
    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required',
            'slug' => 'required|unique:categories|max:255',
            'popular' => 'required',
            'image' => 'required|mimes:jpeg,png,gif,jpg',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $request->slug;
        $category->popular = $request->popular;
        $category->status = $request->has('status') ? 1 : 0;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = "uploads/category/" . time() . "." . $ext;
            $file->move('uploads\category', $filename);
            $category->image = $filename;
        }


        try {
            $category->save();
            return redirect()->back()->with('success', 'Category created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to created category');
        }
    }

    public function get()
    {
        $categories = Category::all();
        return view('admin.category.view-categories', ['categories' => $categories]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view("admin.category.edit-category", ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'description' => 'required',
            'slug' => 'required|unique:categories,slug,' . $id,
            'popular' => 'required',
            'image' => 'required|mimes:jpeg,png,gif,jpg',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $request->slug;
        $category->popular = $request->popular;
        $category->status = $request->has('status') ? 1 : 0;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = "uploads/category/" . time() . "." . $ext;
            $file->move('uploads\category', $filename);
            $category->image = $filename;
        }
        try {
            $category->update();
            return redirect()->back()->with('success', 'Category updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to update category');
        }
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted successfully');
    }
}
