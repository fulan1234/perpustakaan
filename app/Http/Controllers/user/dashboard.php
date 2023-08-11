<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function Index()
    {
        if (Auth::user()->hasRole('admin')){
            return redirect()->route('allcategory');
        }elseif (Auth::user()->hasRole('user')) {
            return redirect()->route('dashboard');
        }
    }
    public function Dashboard()
    {
        $books = Book::latest()->get();
        $top4 = Book::orderByDesc('popularity')->limit(4)->get();

        return view('user.dashboard', compact('top4'));
    }

    public function DetailBook($id)
    {
        $book = Book::findOrFail($id);

        return view('user.detail_product', compact('book'));
    }

    public function AddCart()
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        return view('user.cart', compact('cart_items'));
    }

    public function AddBookToCart(Request $request)
    {
        Cart::insert([
            'book_id' => $request->book_id,
            'user_id' => Auth::id(),
        ]);
        // return redirect()->route('')
        return redirect()->route('addcart')->with('message', 'Book added to cart');
    }

    public function BookItems()
    {
        $books = Book::latest()->get(); 
        $no = 1;
        return view('user.book', compact('books','no'));
    }

    public function CategoryItems()
    {
        $categories = Category::latest()->get(); 
        $no = 1;
        return view('user.category', compact('categories','no'));
    }

    public function CategoryMenu()
    {
        $categories = Category::latest()->get(); 
        return response()->json(['categories' => $categories]);
    }

    public function BookCat($id)
    {
        $books = Book::where('category_id', $id)->get();
        $no = 1;
        return view('user.bookCat', compact('books','no'));
    }

    public function RemoveCartItem($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addcart')->with('message', 'Item Removed from cart');
    }

    public function DownloadFile($id)
    {
        Book::where('id', $id)->increment('popularity',1);
        $file = Book::where('id', $id)->value('book_file');
        $file_path = public_path($file);

        return \Response::download($file_path);
        // return redirect()->route('addcart');
    }

    // =================================================================================

    private function trending($books)
    {
        $top4 = array();
        for($i = 0; $i < 4 && $i < count($books);){
            $book = $books[rand(0, count($books)-1)];

            if(!in_array($book,$top4)){
                array_push($top4, $book);
                $i++;
            }
        }
        return $top4;
    }
}
