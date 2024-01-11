<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//promocode
Route::get('promocode/add', 'PromocodeController@add')->name('promocode.add');
Route::get('promocode/get_detail/{id}', 'PromocodeController@getDetail')->name('promocode.getCodeDetail');
Route::get('promocode', 'PromocodeController@view')->name('promocode.index');
Route::get('promocode/shows/{id}', 'PromocodeController@shows')->name('promocode.shows');
Route::post('promocode/store', 'PromocodeController@create')->name('promocode.create');
Route::get('promocode/edit/{id}', 'PromocodeController@edit')->name('promocode.edit');
Route::post('promocode/update', 'PromocodeController@update')->name('promocode.update');
Route::get('promocode/delete/{id}', 'PromocodeController@delete')->name('promocode.delete');
Route::get('promocode/updateStatus', 'PromocodeController@updateStatus')->name('promocode.status');
Route::post('promocode/apply', 'PromocodeController@applyPromoCode')->name('promocode.apply');
Route::get('promocode/voucher/{id}', 'PromocodeController@viewVoucher')->name('promocode.voucher');
Route::get('promocode/voucher/{id}/print', 'PromocodeController@print')->name('promocode.voucher.print');

//redeem
Route::get('redeem', 'RedeemController@view')->name('redeem');
Route::get('promocode/redeemed', 'RedeemController@index')->name('promocode.redeemed');
Route::get('promocode/redeemed/delete/{id}', 'RedeemController@delete')->name('promocode.redeem.delete');

//discount type
Route::get('discount_type/add', 'DiscountTypeController@add')->name('discountType.add');
Route::get('discount_type', 'DiscountTypeController@view')->name('discountType.index');
Route::post('discount_type/store', 'DiscountTypeController@create')->name('discountType.create');
Route::get('discount_type/edit/{id}',  'DiscountTypeController@edit')->name('discountType.edit');
Route::post('discount_type/update', 'DiscountTypeController@update')->name('discountType.update');
Route::get('discount_type/delete/{id}', 'DiscountTypeController@delete')->name('discountType.delete');

//term condition
Route::get('term_condition/add', 'TermConditionController@add')->name('termCondition.add');
Route::get('term_condition', 'TermConditionController@view')->name('termCondition.index');
Route::post('term_condition/store', 'TermConditionController@create')->name('termCondition.create');
Route::get('term_condition/edit/{id}', 'TermConditionController@edit')->name('termCondition.edit');
Route::post('term_condition/update', 'TermConditionController@update')->name('termCondition.update');
Route::get('term_condition/delete/{id}', 'TermConditionController@delete')->name('termCondition.delete');

Route::get('/import-excel', 'ExcelImportController@index')->name('import.excel');
Route::post('/import-excel', 'ExcelImportController@import')->name('import.excel');

//code detail
Route::get('code_detail/add', 'CodeDetailController@add')->name('codeDetail.add');
Route::get('code_detail', 'CodeDetailController@view')->name('codeDetail.index');
Route::post('code_detail/store', 'CodeDetailController@create')->name('codeDetail.create');
Route::get('code_detail/edit/{id}', 'CodeDetailController@edit')->name('codeDetail.edit');
Route::post('code_detail/update', 'CodeDetailController@update')->name('codeDetail.update');
Route::get('code_detail/delete/{id}', 'CodeDetailController@delete')->name('codeDetail.delete');




Auth::routes();
