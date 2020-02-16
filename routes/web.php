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


Route::get('/', function () {
    return view('welcome');
});




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

