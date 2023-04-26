<?php

use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/category', function (\Illuminate\Http\Request $request) {
    $category = $request->query('category');
    $Cat = DB::select('select * from category where cat_slug = ?', [$category]);
    $cat_id='';
    foreach ($Cat as $row) {
        // $row is an object representing a row in the category table
        $cat_id = $row->id;
    }
    $products = DB::select('select * from products where category_id = ?', [$cat_id]);
    $now = Carbon::now();
    $mostViewed=DB::table('products')
        ->where('date_view', '=', $now)
        ->orderBy('counter', 'desc')
        ->limit(10)
        ->get();

    return view('category',['products'=>$products,'category'=>$category,'mostViewed'=>$mostViewed]);
});

Route::get('/product', function (\Illuminate\Http\Request $request) {
    $slug = $request->query('product');
    $now = Carbon::now();
    $mostViewed=DB::table('products')
        ->where('date_view', '=', $now)
        ->orderBy('counter', 'desc')
        ->limit(10)
        ->get();

    $productDetail = DB::select("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug", ['slug' => $slug]);

    return view('product',['product'=>$productDetail[0],'mostViewed'=>$mostViewed]);
});

Route::get('cart', [FrontEndController::class, 'cart'])->name('cart');

Route::get('add-to-cart/{id}', [FrontEndController::class, 'addToCart'])->name('add.to.cart');

Route::patch('update-cart', [FrontEndController::class, 'updateToCart'])->name('update.cart');

Route::delete('remove-from-cart', [FrontEndController::class, 'removeFromCart'])->name('remove.from.cart');
Route::get('profile', [FrontEndController::class, 'profile'])->name('profile');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('checkout', [FrontEndController::class, 'checkout'])->name('checkout');
    Route::post('stripe',[FrontEndController::class, 'stripePost'])->name('stripe.post');
});
Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

