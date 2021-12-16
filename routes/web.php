<?php

use App\Http\Livewire\AddCategory;
use App\Http\Livewire\AddOrder;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Orders;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/orders', Orders::class)->name('orders');
Route::get('/categories', Categories::class)->name('categories');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    
    Route::get('/category/add', AddCategory::class)->name('category.add');
    Route::get('/category/edit/{category_id}', Categories::class)->name('category.edit');

    Route::get('/order/add', AddOrder::class)->name('order.add');
});