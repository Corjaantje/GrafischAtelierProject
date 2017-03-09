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

Route::get('/aan_de_slag', array('as' => 'aan_de_slag', function () {
    return view('aan_de_slag');
}));

Route::get('/scholen', array('as' => 'scholen', function () {
    return view('scholen');
}));

Route::get('/dagje_uit', array('as' => 'dagje_uit', function () {
    return view('dagje_uit');
}));

Route::get('/opfrissen', array('as' => 'opfrissen', function () {
    return view('opfrissen');
}));
