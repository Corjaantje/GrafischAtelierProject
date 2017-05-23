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
Route::get('nieuws', ['as' => 'nieuws', 'uses' => 'NewsPageController@index']);
Route::post('nieuws', array('as' => 'nieuwsFilter', 'uses' => 'NewsPageController@setFilter'));

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
Route::post('cursus_reserveren', ['as' => 'course_reservation', 'uses' => 'CoursesController@createCourseReservationPage']);
Route::post('cursussen', ['as' => 'submitCourseReservation', 'uses' => 'CoursesController@insertUserIntoCourse']);

Route::get('cms', array('as' => 'cms_home', function(){

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

Route::get('cms/reservations', ['as' => 'cms_reservations', 'uses' => 'ReservationController@create']);
Route::post('cms/cmsCreateReservation', array('as' => 'create_reservation', 'uses' => 'ReservationController@newReservation'));

Route::get('cms/users', ['as' => 'cms_users', 'uses' => 'UserController@create']);
Route::post('cms/cmsCreateUser', array('as' => 'create_user', 'uses' => 'UserController@newUser'));
#-------Nieuwsfilter-------
Route::get('cms/nieuwsfilters', array('as' => 'cms_newsfilters', 'uses' => 'NewsfilterController@createList'));
Route::get('cms/nieuwsfilters/toevoegen', array('as' => 'cms_newsfilters_add', 'uses' => 'NewsfilterController@createAdd'));
Route::post('cms/nieuwsfilters/bewerken', array('as' => 'cms_newsfilters_edit', 'uses' => 'NewsfilterController@createEdit'));
Route::post('cms/nieuwsfilters/verwijderen', array('as' => 'cms_newsfilters_remove', 'uses' => 'NewsfilterController@removeFilter'));

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

#----Reservation Routes----
Route::any('reservation_step1', array('as' => 'reservationStep1', function()
{
    return view('reservation.reservation_step1');
}));

Route::any('reservation_step2', array('as' => 'reservationStep2', function()
{
    return view('reservation.reservation_step3');
}));

Route::any('reservation_step3', array('as' => 'reservationStep3', function()
{
    return view('reservation.reservation_step4');
}));

Route::any('reservation_step4', array('as' => 'reservationStep4', function()
{
    return view('reservation.reservation_step5');
}));

Route::any('ReservationStep2', ['as' => 'ReservationStep_2', 'uses' => 'SessionController@storeType']);
Route::any('ReservationStep3', ['as' => 'ReservationStep_3', 'uses' => 'SessionController@storeDateTime']);
Route::any('ReservationStep4', ['as' => 'ReservationStep_4', 'uses' => 'SessionController@insertReservation']);

Route::get('profiel', ['as' => 'profile', 'uses' => 'ProfileController@getProfile']);

#----Sponsor CMS Routes----
Route::get('cms_sponsor', ['as' => 'cms_sponsor', 'uses' => 'SponsorController@overview']);

Route::get('cms/createSponsors', ['as' => 'cms_createSponsors', 'uses' => 'SponsorController@create']);
Route::post('cms/cmsCreateSponsor', array('as' => 'create_sponsor', 'uses' => 'SponsorController@newSponsor'));
Route::post('cms/cmsEditSponsor', array('as' => 'edit_sponsor', 'uses' => 'SponsorController@edit'));

Route::get('cms/edit_sponsor/{sponsorNumber}', ['as' => 'editSponsor', 'uses' => 'SponsorController@editView']);

Route::post('cms_sponsor/verwijderen', ['as' => 'cms_sponsor_delete', 'uses' => 'SponsorController@delete']);

Route::get('403', ["as" => "403", function()
{
    return view('errors/403');
}]);

