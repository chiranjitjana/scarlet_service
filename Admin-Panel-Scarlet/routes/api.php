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


});


/*All GET REQUEST FOR FETCHING PURPOSE*/
Route::get('fetchAllHomeOffers','API\HomeController@getAllHomeOffers');
Route::get('fetchAllHomeSliders','API\HomeController@getAllHomeSliders');
Route::get('fetchAllTestimonials','API\TestimonialController@getAllTestimonials');
Route::get('fetchAllGallery','API\GalleryController@getAllGallery');
