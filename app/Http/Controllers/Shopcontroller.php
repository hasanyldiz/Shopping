<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;

class Shopcontroller extends Controller
{
    
    public function index() //sepet sayfası
    {
    
      $books=CartFacade::getContent();
      //dd($books);
        return view('cart',compact('books'));

    }
    public function addtocart($id)
    {
        
        $book=Book::findOrFail($id);
        if (!$book) {
            // Kitap bulunamadı, hata mesajı gönderin veya yönlendirme yapın
            return redirect()->back()->with('error', 'Kitap bulunamadı.');
        }
        $quantity = 1; // Örneğin, varsayılan olarak 1 adet ekleyin
       
    
        //CartFacade::add($book->id, $book->BookName, $book->BookPrice, $quantity, $attributes);
        CartFacade::add([
            'id' => $book->id,
            'name' => $book->BookName,
            'price' => $book->BookPrice,
            'quantity' =>$quantity,
            'attributes' => array(),
        ]);
     //  dd($quantity,$book->BookName,$book->BookPrice);
        
        return redirect()->back();

    }
    public function removefromcart(request $request)
    {
        //$product=Book::where('id',$request->id)->firstOrFail();

        CartFacade::remove([
            'id' => $request->id,
        ]);
        return back();
    }


    public function cartupdate(request $request)
    {
        $newqyt=$request->newQuantity;
        CartFacade::update($request->id,[
            'quantity' => array(
            'relative' => true,
            'value'=>$newqyt,
            )
        ]);
    // dd($request->id,$request->$newqyt);      
        

     return back();
    }
    
}
