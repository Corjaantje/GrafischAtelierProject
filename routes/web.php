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
Route::get('nieuws', array('as' => 'nieuws', function () {
    return view('NewsPage');
}));
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
Route::get('webshop', array('as' => 'webshop', function () {
	return view('Webshop');
}));
Route::get('product/{ProductNr}', function ($ProductNr) {
	$data = array(
			'Id' => $ProductNr 
	);
	
	return view('Product', $data);
});
Route::get('archive', function () {
    return view('archive');
});

Route::get('aan_de_slag', array('as' => 'aan_de_slag', function () {
    return view('aan_de_slag');
}));

Route::get('scholen', array('as' => 'scholen', function () {
    return view('scholen');
}));

Route::get('dagje_uit', array('as' => 'dagje_uit', function () {
    return view('dagje_uit');
}));

Route::get('opfrissen', array('as' => 'opfrissen', function () {
    return view('opfrissen');
}));
