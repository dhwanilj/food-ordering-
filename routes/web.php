<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Dishes;
use App\Models\Orders;
use App\Models\Restaurant_application;
use App\Models\Favourite;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\DishImageController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\Restaurant_applicationController;
use Carbon\Carbon;

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
Route::resource('user',UserController::class);
Route::resource('dishes',DishesController::class);
Route::resource('order',OrdersController::class);
Route::resource('dishImage',DishImageController::class);
Route::resource('favourite',FavouriteController::class);
Route::resource('restaurant_application',Restaurant_applicationController::class);

Route::get('/', [UserController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('top_5',function(){
    $start = Carbon::now()->subDays(30);
    $end = Carbon::now();
    $top_dishes = Orders::selectRaw("count(orders.dish_id) as total_ordered,dishes.name as dish_name,users.name as restaurant_name,orders.created_at")
                            ->join('dishes','dishes.id','=','orders.dish_id')
                            ->join('users','users.id','=','orders.restaurant_id')
                            ->groupBy('dish_id')
                            ->whereBetween('orders.created_at', [$start,$end])
                            ->orderBy('total_ordered','desc')
                            ->take(5)->get();
    return view('top_5_dishes')->with('top_dishes',$top_dishes);
});

Route::get('documentation', function () {
    return view('documentation');
});

require __DIR__.'/auth.php';

Route::get('test',function(){
    $dishes = user::find(2)->dishes;
    dd($dishes);
});

Route::get('test1',function(){
    $user = dishes::find(2)->user;
    dd($user);
});

Route::get('test2',function(){
    $orders = dishes::find(1)->order;
    dd($orders);
});

Route::get('test3',function(){
    $orders = user::find(6)->order;
    dd($orders);
});

Route::get('test4',function(){
    $images = dishes::find(1)->image;
    dd($images);
});

Route::get('test5',function(){
    $images = user::find(1)->image;
    dd($images);
});

Route::get('test6',function(){
    $orders = user::find(2)->restaurant_order;
    dd($orders);
});