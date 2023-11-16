<?php

use App\Http\Controllers\Bookcontroller;
use App\Http\Controllers\Ordercontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shopcontroller;
use App\Http\Controllers\Testcontroller;
use App\Http\Controllers\HomeController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyCsrfToken;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



/*Route::controller(Testcontroller::class)->group(function () {
    Route::get('admin/test'  ,"test"  )->name('test');
    Route::get('admin/detail',"detail")->name('detail');
    
});*/
Route::get('/sepet',[Shopcontroller::class,'index'])->name('Shop.index');
Route::get('/sepete_ekle/{id} ',[Shopcontroller::class,'addtocart'])->name('Shop.addtocart');
Route::get('/sepetten_cikar',[Shopcontroller::class,'removefromcart'])->name('Shop.removefromcart');
Route::get('/sepeti_güncelle',[Shopcontroller::class,'cartupdate'])->name('Shop.cartupdate');
Route::post('/siparisi_olustur',[Ordercontroller::class,'store'])->name('Order.store');

Route::post('/laravel-10-egitimi',[Ordercontroller::class,'success'])->name('Order.success');
Route::post('/siparis_basarisiz',[Ordercontroller::class,'fail'])->name('Order.fail');





Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/deneme', [Testcontroller::class,"test"])  ->name('test');
    Route::get('/detail', [Testcontroller::class,"detail"])->name('detail');
    Route::get('/kitaplar', [Bookcontroller::class,"index"])->name('books.index');
    Route::get('/kitaplar/Ekle', [Bookcontroller::class,"create"])->name('books.create');
    Route::post('/kitaplar/Ekle', [Bookcontroller::class,"store"])->name('books.store');
    Route::get('/kitaplar/{book}', [Bookcontroller::class,"edit"])->name('books.edit');
    Route::post('/kitaplar/{book}', [Bookcontroller::class,"update"])->name('books.update');
    Route::get('/kitaplar/sil/{book}', [Bookcontroller::class,"delete"])->name('books.delete');
    Route::get('/kitaplar/GeriAl/{book}', [Bookcontroller::class,"takeback"])->name('books.takeback')->withTrashed();
   
    
    
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


