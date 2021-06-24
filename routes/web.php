<?php

use App\Http\Livewire\AddUser;
use App\Http\Livewire\MakeItemsRequest;
use App\Http\Livewire\ShowVendor;
use App\Http\Livewire\Welcome;
use App\Http\Livewire\ShowVendorDetails;
use App\Http\Livewire\Vendors;
use App\Http\Livewire\Department;
use App\Http\Livewire\UpdateItemsRequest;
use App\Http\Livewire\SuppliesWire;
use App\Http\Livewire\ItemsUpdate;
use App\Http\Livewire\SuppliesUpdate;
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
    return view('welcome');
});
Route::get('/vendor', Vendors::class)->name('apply');
Route::group(['middleware'=>'auth:sanctum'],function(){

Route::get('/board', Welcome::class);
Route::get('/admin/vendor', ShowVendor::class)->name('all_vendor');
Route::get('/admin/make_request', MakeItemsRequest::class)->name('make_request');
Route::get('/admin/request', UpdateItemsRequest::class)->name('request');
Route::get('/admin/vendor/{id}', ShowVendorDetails::class);
Route::get('/admin/supply/{id}', SuppliesUpdate::class);
Route::get('/admin/item/{id}', ItemsUpdate::class);
Route::get('/admin/staff/',AddUser::class)->name('add_staff');
Route::get('/admin/supplies',SuppliesWire::class)->name('supplies');
Route::get('/admin/department/',Department::class)->name('add_department');
});
// Route::get('/vendors', Vendors::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
