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

Route::get('winkel', array('as' => 'webshop', function () {
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
    return view('Agenda');
}));


Route::get('cms', array('as' => 'cmsPanel', function() {
    return view('cmsHome');
}));

Route::get('cms_nieuws', array('as' => 'cmsNews', function() {
    return view('cmsNews');
}));

Route::post('cmsEditArticle', 'NewsArticleController@editArticle');

Route::get('cms_nieuw_nieuws_artikel', array('as' => 'newNewsArticle', function() {
    return view ('newNewsArticle');
}));

Route::get('cms_wijzig_nieuws_artikel/{artikelNummer}', array('as' => 'editNewsArticle', function($artikelNummer) {
    $data = array(
        'ID' => $artikelNummer
    );
    return view('editNewsArticle', $data);
}));

Auth::routes();

Route::get('/home', 'HomeController@index');