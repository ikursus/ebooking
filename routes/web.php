<?php

Route::get('/', 'PagesController@homepage')->name('homepage');
Route::get('hubungi', 'PagesController@hubungi')->name('c');

# Route untuk paparkan senarai users
Route::get('users', 'UsersController@index')->name('users.index');
# Route untuk papar borang tambah lab
Route::get('users/add', 'UsersController@create')->name('users.create');
# Route untuk simpan rekod dari borang tambah lab
Route::post('users/add', 'UsersController@store')->name('users.store');
# Route untuk papar bornag edit lab
Route::get('users/{id}/edit', 'UsersController@edit')->name('users.edit');
# Route untuk kemaskini rekod lab
Route::patch('users/{id}/edit', 'UsersController@update')->name('users.update');
# Route untuk delete lab
Route::delete('users/{id}', 'UsersController@destroy')->name('users.destroy');


# Route untuk paparkan senarai lab
Route::get('lab', 'LabController@index')->name('lab.index');
# Route untuk papar borang tambah user
Route::get('lab/add', 'LabController@create')->name('lab.create');
# Route untuk simpan rekod dari borang tambah user
Route::post('lab/add', 'LabController@store')->name('lab.store');
# Route untuk papar bornag edit user
Route::get('lab/{id}/edit', 'LabController@edit')->name('lab.edit');

# Route untuk kemaskini rekod user
Route::patch('lab/{id}/edit', 'LabController@update')->name('lab.update');
# Route untuk delete user
Route::delete('lab/{id}', 'LabController@destroy')->name('lab.destroy');


#Route::resource('lab', 'LabController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
