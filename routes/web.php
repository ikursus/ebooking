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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hubungi', function () {

  return view('pages/template_hubungi');

})->name('c');

# Route untuk paparkan senarai users
Route::get('users', function () {

  $page_title = '<h1>Senarai Users</h1>';

  $senarai_users = [

    ['id' => 1, 'nama' => 'Ali Bin Baba', 'email' => 'alibaba@gmail.com', 'phone' => '0123456789'],
    ['id' => 2, 'nama' => 'Abdul Wahab', 'email' => 'abdul@gmail.com', 'phone' => '0123656789'],
    ['id' => 3, 'nama' => 'Sidiq Sigaraga', 'email' => 'sidiq@gmail.com', 'phone' => '016576789'],
    ['id' => 4, 'nama' => 'Chong Wei', 'email' => 'chongwei@gmail.com', 'phone' => '019866789'],
    ['id' => 5, 'nama' => 'Siti', 'email' => 'siti@gmail.com', 'phone' => '0123456559']

  ];

  # return view('users/template_index', ['page_title' => $page_title]);
  # return view('users/template_index')->with('page_title', $page_title);
  return view('users/template_index', compact('page_title', 'senarai_users'));

});

Route::get('users/add', function () {
  return view('users/template_add');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
