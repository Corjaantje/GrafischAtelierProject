<?php
/*
      _____               _____               ____                 _
     / ____|    /\       |  __ \             |  _ \               | |
     | |  __   /  \      | |  | | ___ _ __   | |_) | ___  ___  ___| |__
     | | |_ | / /\ \     | |  | |/ _ \ '_ \  |  _ < / _ \/ __|/ __| '_ \
     | |__| |/ ____ \    | |__| |  __/ | | | | |_) | (_) \__ \ (__| | | |
      \_____/_/    \_\   |_____/ \___|_| |_| |____/ \___/|___/\___|_| |_|
*/

#----Home Route----
Route::get('/', function () {
	return view('home');
});

#----More detailed Routes----
Route::get('product/{ProductNr}', function ($ProductNr) {
    $data = array(
        'Id' => $ProductNr
    );
    return view('Product', $data);
});

Route::get('artikel/{ArtikelNr}', function ($ArtikelNr) {
    $data = array(
        'Id' => $ArtikelNr
    );
    return view('NewsArticle', $data);
});

#----Standard Page Routes----
Route::get('nieuws', array('as' => 'nieuws', function () {
    return view('NewsPage');
}));

Route::get('werkplaats', array('as' => 'werkplaats', function () {
    return view('werkplaats');
}));

Route::get('winkel', array('as' => 'winkel', function () {
    return view('Webshop');
}));

Route::get('archief', array('as' => 'archief', function () {
    return view('archive');
}));

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

Route::get('over_ons', array('as' => 'about', function() {
    return view('about');
}));

Route::get('agenda', array('as' => 'agenda', function() {
    return view('agenda');
}));

Route::get('cms', array('as' => 'cms_home', function() {
    return view('cms.cms_home');
}));

Route::get('cms/header', ['as' => 'cms_header', 'uses' => 'CMSHeaderNavigationController@create']);

Route::post('cms/header', ['as' => 'cms_header_store', 'uses' => 'CMSHeaderNavigationController@store']);


Route::get('cms/productbewerker', array('as' => 'cmsProductEditor', function(){
	return view('cmsProductEditor');
}));
Route::get('cms/productbewerker/{ProductId}', array('as' => 'cmsProductEditor', function($ProductId){
	$data = array(
		'Id' => $ProductId	
	);
	return view('cmsProductEditor', $data);
}));
Route::get('cms/product_lijst', array('as' => 'ProductList', function(){
	return view('cmsProductList');
}));
Route::post('cms/cmsCreateProduct', 'ProductController@insertProduct');
Route::post('cms/productbewerker/cmsCreateProduct', 'ProductController@insertProduct');
Route::get('cms/verwijderProduct/{id}', ['uses' => 'ProductController@removeItem']);


Auth::routes();

Route::get('/home', 'HomeController@index');