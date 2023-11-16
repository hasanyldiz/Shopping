<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Testcontroller extends Controller
{
   public function Test()
   {
    return view('test');
   }
   public function detail()
   {
    return view('detail');
   }

   
}
