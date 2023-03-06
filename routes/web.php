<?php

use App\Core\Routing\Route;

Route::get('/', 'Contact@index');
Route::post('/contact/create', 'Contact@create');
Route::post('/contact/delete/{contactID}', 'Contact@delete');
Route::post('/contact/edit/{contactID}', 'Contact@edit');
