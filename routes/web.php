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
    return view('product', $data);
});

Route::get('artikel/{ArtikelNr}', function ($ArtikelNr) {
    $data = array(
        'Id' => $ArtikelNr
    );
    return view('news_article', $data);
});

#----Standard Page Routes----
Route::get('nieuws', array('as' => 'nieuws', function () {
    return view('news_page');
}));

Route::get('werkplaats', array('as' => 'werkplaats', function () {
    return view('workplace');
}));

Route::get('winkel', array('as' => 'winkel', function () {
    return view('webshop');
}));

Route::get('archief', array('as' => 'archief', function () {
    return view('archive');
}));

Route::get('aan_de_slag', array('as' => 'aan_de_slag', function () {
    return view('getting_started');
}));

Route::get('scholen', array('as' => 'scholen', function () {
    return view('schools');
}));

Route::get('dagje_uit', array('as' => 'dagje_uit', function () {
    return view('day_out');
}));

Route::get('opfrissen', array('as' => 'opfrissen', function () {
    return view('brush_up');
}));

Route::get('over_ons', array('as' => 'about', function () {
    return view('about');
}));

Route::get('agenda', ['as' => 'agenda', 'uses' => 'AgendaController@show']);

Route::get('cursussen', ['as' => 'courses', 'uses' => 'CoursesController@createCoursesPage']);

Route::get('cms', array('as' => 'cms_home', function()

    return view('cms.cms_home');
}));
#----Course Signup----
Route::post('cursus_bevestigen', ['as' => 'confirm_course_signup', 'uses' => 'CourseSignupController@Signup']);
Route::post('cursus_bevestigd', ['as' => 'course_signup_confirmed', 'uses' => 'CourseSignupController@Confirmed']);

#----CMS Routes----
#------Header CMS------
Route::get('cms/header', ['as' => 'cms_header', 'uses' => 'HeaderNavigationController@create']);

Route::post('cms/header', ['as' => 'cms_header_store', 'uses' => 'HeaderNavigationController@store']);

#------Product CMS------
Route::get('cms/productbewerker/{ProductId}', array('as' => 'product_editor', function ($ProductId) {
    $data = array(
        'Id' => $ProductId
    );
    return view('cms.cms_edit_product', $data);
}));

Route::get('cms/nieuw_product', array('as' => 'product_creator', function () {
    return view('cms.cms_new_product');
}));

Route::get('cms/product_lijst', array('as' => 'cms_product_list', function () {
    return view('cms.cms_product_list');
}));

Route::post('cms/cmsCreateProduct', array('as' => 'create_product', 'uses' => 'ProductController@newProduct'));
Route::post('cms/productbewerker/cmsCreateProduct', array('as' => 'edit_product', 'uses' => 'ProductController@editProduct'));

Route::get('cms/verwijderProduct/{id}', ['uses' => 'ProductController@removeItem']);

#------Nieuws CMS------
Route::get('cms/nieuws', array('as' => 'cms_news', function () {
    return view('cms.cms_news');
}));

Route::post('cms/wijzig_artikel/wijzig_artikel', 'NewsArticleController@insertNewsArticle');
Route::post('cms/nieuw_artikel', 'NewsArticleController@insertNewsArticle');

Route::get('cms/nieuw_artikel', array('as' => 'newNewsArticle', function () {
    return view('cms.cms_new_news_article');
}));

Route::get('cms/wijzig_artikel/{artikelNummer}', array('as' => 'editNewsArticle', function ($artikelNummer) {
    $data = array(
        'id' => $artikelNummer
    );
    return view('cms.cms_edit_news_article', $data);
}));

#----Manage Courses Routes----
Route::get('cms/cursus', ['as' => 'cms_courses_list', 'uses' => 'CoursesController@createList']);
Route::get('cms/cursus/toevoegen', ['as' => 'cms_courses_add', 'uses' => 'CoursesController@createAdd']);
Route::post('cms/cursus/bewerken', ['as' => 'cms_courses_edit', 'uses' => 'CoursesController@createEdit']);
Route::post('cms/cursus/toevoegen/bevestiging', ['as' => 'cms_courses_add_confirmation', 'uses' => 'CoursesController@createAddConfirmation']);
Route::post('cms/cursus/toevoegen/bevestigd', ['as' => 'cms_courses_add_confirmed', 'uses' => 'CoursesController@setAdd']);

Route::post('cms/cursus/bewerkenActie', ['as' => 'cms_edit_action', 'uses' => 'CoursesController@editAction']);
Route::post('cms/cursus/verwijderen', ['as' => 'cms_courses_delete', 'uses' => 'CoursesController@deleteAction']);

#----Login & Register Routes----
Auth::routes();

Route::get('/home', 'HomeController@index');
