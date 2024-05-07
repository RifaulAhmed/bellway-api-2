<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\UserController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/registerUser', [AdminController::class, 'registerUser'])->name('register');
// // Route::post('/registerCreate', [AdminController::class, 'registerCreate'])->name('registerCreate');
// Route::get('/loginUser', [AdminController::class, 'loginUser'])->name('loginUser');
// Route::get('/logoutUser', [AdminController::class, 'logoutUser'])->name('logoutUser');




//Admin And Products Api's
Route::get('/admin', [AdminController::class, 'index'])->name('adminDashboard');

Route::get('/adminProducts', [AdminController::class, 'adminProducts']);
Route::get('/products', [AdminController::class, 'getProducts']);

Route::post('/addNewProduct', [AdminController::class, 'addNewProduct']);
Route::post('/updateProduct', [AdminController::class, 'updateProduct']);
Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct']);


//Vendor details Api's
Route::get('/vendorDetails', [AdminController::class, 'vendorDetails']);
Route::get('/vendors', [AdminController::class, 'getVendors']);
Route::get('/changeVendorStatus/{status}/{id}', [AdminController::class, 'changeVendorStatus']);


//Cutomers Api's
Route::get('/customerOrders', [AdminController::class, 'customerOrders']);
Route::get('/changeCustomerStatus/{status}/{id}', [AdminController::class, 'changeCustomerStatus']);
Route::get('/customers', [AdminController::class, 'getUsers']);







//Api.php

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('user-register',[UserController::class,'createUser']);

// Route::put('get-user-update/{id}',[UserController::class,'updateUser']);

// Route::delete('delete-user/{id}',[UserController::class,'deleteUser']);

// Route::post('user-login',[UserController::class,'userLogin']);


// Route::get('unauthenticate',[UserController::class,'unauthenticate'])->name('unauthenticate');


// //Secure routes with middleware auth

// Route::middleware('auth:api')->group(function(){
//     Route::get('get-users',[UserController::class,'getUsers']);

//     Route::get('get-user-detail/{id}',[UserController::class,'getUserDetail']);

//     Route::get('user-logout',[UserController::class,'userLogout']);
// });
