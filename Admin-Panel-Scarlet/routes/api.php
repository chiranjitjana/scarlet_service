<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

/** ONLY LOGIN USER ABLE TO CALL THE BELOW URLS*/
Route::group(['middleware' => 'auth:api'], function(){
      Route::post('details', 'API\UserController@details');

      Route::post('createHomeOffer', 'API\HomeController@addHomeOffers');
      Route::post('updateHomeOffer', 'API\HomeController@updateHomeOffer');
      Route::post('removeHomeOffer/{id}', 'API\HomeController@removeHomeOffer');

      Route::post('createHomeSlider', 'API\HomeController@addHomeSliderBanner');
      Route::post('updateHomeSlider', 'API\HomeController@updateHomeSliderBanner');
      Route::post('removeHomeSlider/{id}', 'API\HomeController@removeHomeSlider');

      Route::post('createTestimonial', 'API\TestimonialController@addTestimonial');
      Route::post('updateTestimonial', 'API\TestimonialController@updateTestimonial');
      Route::post('removeTestimonial/{id}', 'API\TestimonialController@removeTestimonial');

      Route::post('createGallery', 'API\GalleryController@addToGallery');
      Route::post('updateGallery', 'API\GalleryController@updateGallery');
      Route::post('removeGallery/{id}', 'API\GalleryController@removeGallery');

      /*tour CRUD urls*/
      Route::post('createTourTopic', 'API\TourController@addToTourTopic');
      Route::post('updateTourTopic', 'API\TourController@updateTourTopic');
      Route::post('removeTourTopic/{id}', 'API\TourController@removeTourTopic');

      Route::post('createTour', 'API\TourController@addTour');
      Route::post('updateTour', 'API\TourController@updateTour');
      Route::post('removeTour/{id}', 'API\TourController@removeTour');

      Route::post('createTourOverView', 'API\TourController@addTourOverView');
      Route::post('updateTourOverView', 'API\TourController@updateTourOverView');
      Route::post('removeTourOverView/{id}', 'API\TourController@removeTourOverView');


});


/*All GET REQUEST FOR FETCHING PURPOSE*/
Route::get('fetchAllHomeOffers','API\HomeController@getAllHomeOffers');
Route::get('fetchAllHomeSliders','API\HomeController@getAllHomeSliders');
Route::get('fetchAllTestimonials','API\TestimonialController@getAllTestimonials');
Route::get('fetchAllGallery','API\GalleryController@getAllGallery');
Route::get('fetchAllContact','API\ContactsController@getAllContact');
Route::get('fetchAllTourTopic','API\TourController@getAllTourTopic');
Route::get('fetchAllTour','API\TourController@getAllTour');
Route::get('fetchAllTourOverView','API\TourController@getAllTourOverView');
/*All PUBLIC POST URLS*/
Route::post('createContact','API\ContactsController@addContact');
