<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class bookController extends Controller
{
    public function AllBook()
    {
        $books = Book::latest()->get(); 
        $no = 1;
        return view('admin.allbook', compact('books','no'));
    }

    public function AddBook()
    {
        $categories = Category::latest()->get();
        return view('admin.addbook', compact('categories'));
    }

    public function StoreBook(Request $request)
    {
        $request->validate([
            'book_name' => 'required | unique:books',
            'description' => 'required',
            'book_count' => 'required',
            'book_file' => 'required | mimes:pdf',
            'book_cover' => 'required |image|mimes:jpeg,png,jpg,svg',
        ]);

        $image = $request->file('book_file');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->book_file->move(public_path('book_files'),$img_name);
        $files_url = 'book_files/'. $img_name;

        $image = $request->file('book_cover');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->book_cover->move(public_path('book_covers'),$img_name);
        $covers_url = 'book_covers/'. $img_name;

        $category_id = $request->book_category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');

        $lolo = Book::insert([
            'book_name' => $request->book_name,
            'category_name' => $category_name,
            'category_id' => $request->book_category_id,
            'description' => $request->description,
            'book_count' => $request->book_count,
            'book_file' => $files_url,
            'book_cover' => $covers_url,
            'slug' => strtolower(str_replace(' ', '-',$request->book_name))
        ]);

        Category::where('id', $category_id)->increment('book_count',1);

        return redirect()->route('allbook')->with('message', 'Kategori Berhasil Ditambah !');
    }

    public function Editbook($id)
    {
        $book_info = book::findOrfail($id);
        // dd($book_info);
        $categories = Category::latest()->get();
        return view('admin.editbook', compact('book_info', 'categories'));
    }

    public function UpdateBook(Request $request)
    {
        $book_id = $request->book_id;
        $category_id = $request->book_category_id;
        $request->validate([
            'book_name' => 'required',
            'description' => 'required',
            'book_count' => 'required',
            // 'category_name' => 'required'
        ]);

        // dd($category_id);

        $img_old = $request->old_img;
        $new_img_file = $request->file('book_cover');
        $new_img = $request->book_cover;

        $cov = $new_img_file == null ? $img_old : $this->updateImg($img_old,$new_img,$new_img_file);
        $category_name = Category::where('id', $category_id)->value('category_name');

        Book::findOrFail($book_id)->update([
            'book_name' => $request->book_name,
            'category_name' => $category_name,
            'category_id' => $request->book_category_id,
            'description' => $request->description,
            'book_count' => $request->book_count,
            'book_cover' => $cov,
            'slug' => strtolower(str_replace(' ', '-',$request->book_name))
        ]);

        //dd($hei);
        return redirect()->route('allbook')->with('message', 'Book Information Successfully!');
    }

    public function DeleteBook($id)
    {
        $cat_id = Book::where('id', $id)->value('category_id');

        Book::findOrFail($id)->delete();

        Category::where('id', $cat_id)->decrement('book_count');

        return redirect()->route('allbook')->with('message', 'Buku telah dihapus');

    }

    

    // =======================================================================================================================================

    private function updateImg($img_old,$new_image ,$new_img_file)
    {
        
            $image = $new_img_file;
            $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $new_image->move(public_path('upload'),$img_name);
            $img_new_url = 'upload/'. $img_name;    
        
        $cover = $new_image == NULL ? $img_old : $img_new_url;

        return $cover;
    }

}
