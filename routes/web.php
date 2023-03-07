<?php

use App\Core\Routing\Route;

Route::get('/', 'Contact@index');
Route::get('/contact/edit/{contactID}', 'Contact@editView');
Route::post('/contact/edit/{contactID}', 'Contact@editContact');
Route::post('/contact/create', 'Contact@create');
Route::post('/contact/delete/{contactID}', 'Contact@delete');
