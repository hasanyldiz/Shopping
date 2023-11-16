<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookstoreRequest;
use App\Models\Book;
use App\Models\User;
use Database\Seeders\books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Bookcontroller extends Controller
{

    public function index()
    {    
        Book::get();
        $user=auth()->user();
        
        $books= $user ->books()->withTrashed()->get();
        return view('books.index',compact('books'));
      
    }
    public function create()
    {
        return view('books.create');
    }
    public function store(BookstoreRequest $request)
    {
        $book=new Book();
        $book->BookName=$request->BookName;
        $book->BookPrice=$request->BookPrice;
        $book->user_id =auth()->id();
        $book->save();

        Cache::delete('books');
        return redirect()->back();
    }
    public function edit(Book $book)
    {
        $user=auth()->user();
       
        
        abort_if($book->user_id!=$user->id,403);
             
        return view('books.edit',compact('book')); 

        
    }
    public function update(Request $request,Book $book)
    {
        $user=auth()->user();
        abort_unless($user->books()->pluck('id')->contains($book->id),404);

        $book->BookName=$request->BookName;
        $book->BookPrice=$request->BookPrice;
        $book->save();
        Cache::delete('books');
        return redirect()->back();
    }
    public function delete(Book $book)
    {
        $book->delete();
       
        Cache::delete('books');
        
        return redirect()->back();
    }
    public function takeback(Book $book)
    {
        $book->takeback();
        Cache::delete('books');
        return redirect()->back();
    }
 
}
