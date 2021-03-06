<?php
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

// use App\Models\Category;
// use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;


require ('admin.php');


Route::view('/','site.pages.homepage');

Auth::routes();


// Route::get('/mos', function (Category $category) {
//     return $category::find(1);
// });

// Route::get('/mos', function () {
//     try{
//         return Category::findOrFail(1000);
//     }catch(ModelNotFoundException $e){

//         throw new ModelNotFoundException($e);
//     }
// });

Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');
Route::post('/product/add/cart','Site\productController@addToCart')->name('product.add.cart');
Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove','Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear','Site\CartController@clearCart')->name('checkout.cart.clear');

