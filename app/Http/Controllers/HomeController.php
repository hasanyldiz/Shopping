<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
    if (!Cache::has('books')) {
        $books = Book::get();
        Cache::put('books', $books);
    } else {
        $books = Cache::get('books');
    }
    
    $template = env('TEMPLATE');
    
    return view($template . 'welcome', compact('books'));

        
    }
    
    public function home()
    {
        if(!Cache::has('books'))
        {
            $books=Book::get();
            Cache::put('books',$books);
        }
        else
        {
            $books=Cache::get('books');
        }
        $template=env('TEMPLATE');
        return view($template.'welcome', compact('books'));
    }

}
