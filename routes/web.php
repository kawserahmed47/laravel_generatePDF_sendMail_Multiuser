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

// Route::get('/', function () {
//     return view('welcome');
// });


//Admin Coontroller
Route::get('/adminLogin','AdminController@adminLogin')->name('adminLogin');
Route::get('/adminRegister','AdminController@adminRegister')->name('adminRegister');
Route::post('/registerAdmin','AdminController@registerAdmin')->name('registerAdmin');
Route::get('/adminLogout','AdminController@adminLogout')->name('adminLogout');
Route::post('/loginCheck','AdminController@loginCheck')->name('loginCheck');
Route::post('/changeRole','AdminController@changeRole')->name('changeRole');








Route::get('/invoice','HomeController@invoice')->name('invoice');
Route::post('/insertInvoice','HomeController@insertInvoice')->name('insertInvoice');



Route::get('/','HomeController@index')->name('index');
Route::get('/viewApplication', 'HomeController@viewApplication')->name('viewApplication')->middleware('auth');
Route::get('/viewInvoice/{id}', 'HomeController@viewInvoice')->name('viewInvoice');
Route::get('/printInvoice/{id}', 'HomeController@printInvoice')->name('printInvoice');
Route::get('/printInvoiceCopy/{id}', 'HomeController@printInvoiceCopy')->name('printInvoiceCopy');
Route::get('/genrateExcel', 'HomeController@genrateExcel')->name('genrateExcel');

Route::get('/programs','ProgramsController@programs')->name('programs');
Route::post('/insertProgram','ProgramsController@insertProgram')->name('insertProgram');
Route::get('/editProgram/{id}','ProgramsController@editProgram')->name('editProgram');
Route::post('/updateProgram/{id}','ProgramsController@updateProgram')->name('updateProgram');
Route::get('/deleteProgram/{id}','ProgramsController@deleteProgram')->name('deleteProgram');
Route::get('/changeStatus/{id}','ProgramsController@changeStatus')->name('changeStatus');



Route::post('/insertApplication','ApplicationController@insertApplication')->name('insertApplication');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Mail
Route::get('/sendMail','MailController@sendMail')->name('sendMail');
Route::get('/createMail','MailController@createMail')->name('createMail');
Route::post('/sendM','MailController@sendM')->name('sendM');