<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\TreasuriesController;

use App\Http\Controllers\Admin\TreasuriesDeliveryController;
use App\Http\Controllers\Admin\SalesMaterialTypesController;
use App\Http\Controllers\Admin\StoresController;
use App\Http\Controllers\Admin\UomsController;
use App\Http\Controllers\Admin\InvItemcardCategoriesController;
use App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

define('PAGINATE_COUNT',10);

Route::get('/',function()
{
    return view('welcome');
});



Route::group([
    'prefix'=>'admin',
    'namespace'=>'Admin',
    'middleware'=>'guest:admin'
],function()
{
    Route::get('getLogin',[LoginController::class,'getLogin']);

    Route::post('getLogin',[LoginController::class,'Login'])->name('login');
});



Route::group([
    'prefix'=>'admin',
    'middleware'=>'auth:admin'
],function()
{

    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    Route::resource('/AdminSetting',AdminSettingsController::class);
    Route::resource('/Treasures',TreasuriesController::class);
    ////// use ajax method /////
    Route::get('ahmed/{name}',[TreasuriesController::class,'getData'])->name('ahmed');

    Route::resource('Treasures_delivery',TreasuriesDeliveryController::class);

    Route::get('/addTresuire_delivery/{id}',[TreasuriesDeliveryController::class,'addTresuire_delivery'])->name('addTresuire_delivery');
 
    Route::resource('sales_material_types',SalesMaterialTypesController::class);

    Route::resource("store",StoresController::class);

    Route::resource("uoms",UomsController::class);

    Route::resource("inv_itemcard_categories",InvItemcardCategoriesController::class);


    

    
});
