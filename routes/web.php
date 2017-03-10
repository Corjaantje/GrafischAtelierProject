<?php
/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::get('/', function () {
    return view('home');
});
Route::get('nieuws', function () {
    return view('NewsPage');
});
Route::get('artikel/{ArtikelNr}', function ($ArtikelNr) {
    $data = array(
        'Id' => $ArtikelNr
    );
    return view('NewsArticle', $data);
});
Route::get('/educatie', function () {
    return view('educatie');
});
Route::get('werkplaats', function () {
    return view('werkplaats');
});
Route::get('archive', function () {
    return view('archive');
});