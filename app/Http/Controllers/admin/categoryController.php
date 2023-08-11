<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function AllCategory()
    {
        $categories = Category::latest()->get(); 
        return view('admin.allcategory', compact('categories'));
    }

    public function AddCategory()
    {
        return view('admin.addcategory');
    }

    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required | unique:categories'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-',$request->category_name))
        ]);

        return redirect()->route('allcategory')->with('message', 'Kategori Berhasil Ditambah !');
    }

    public function EditCategory($id)
    {
        $category_info = Category::findOrfail($id); 
        return view('admin.editcategory', compact('category_info'));
    }

    public function UpdateCategory(Request $request)
    {
        $category_id = $request->category_id;

        $request->validate([
            'category_name' => 'required | unique:categories|'
        ]);

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-',$request->category_name))
        ]);

        return redirect()->route('allcategory')->with('message', 'Category Updated Successfully');
    }

    public function DeleteCategory($id)
    {
        Category::findOrfail($id)->delete();

        return redirect()->route('allcategory')->with('message', 'Kategori Berhasil Dihapus');
    }
}
