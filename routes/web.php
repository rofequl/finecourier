<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'FrontendController@index')->name('home');

Route::get('/index', function () { $title = 'Home V2'; return view('index2',compact('title'));})->name('home2');

Route::get('/about_us', function () { $title = 'About us'; return view('about_us',compact('title'));})->name('about_us');

Route::get('/about_us2', function () { $title = 'About us'; return view('about_us2',compact('title'));})->name('about_us2');

Route::get('/service', function () { $title = 'Our Service'; return view('service',compact('title'));})->name('service');

Route::get('/service_sidebar', function () { $title = 'Service Sidebar'; return view('service_sidebar',compact('title'));})->name('service_sidebar');

Route::get('/single_service', function () { $title = 'Service Details'; return view('single_service',compact('title'));})->name('single_service');

Route::get('/track_trace', function () { $title = 'Track & Trace'; return view('track_trace',compact('title'));})->name('track_trace');

Route::get('/quote', function () { $title = 'Request Quote'; return view('quote',compact('title'));})->name('quote');

Route::get('/news', function () { $title = 'Latest News'; return view('news',compact('title'));})->name('news');

Route::get('/news_list', function () { $title = 'News List'; return view('news_list',compact('title'));})->name('news_list');

Route::get('/single_news', function () { $title = 'News Details'; return view('single_news',compact('title'));})->name('single_news');

Route::get('/login', function () { $title = 'Login'; return view('login',compact('title'));})->name('login');

Route::get('/contact', function () { $title = 'Contact Us'; return view('contact',compact('title'));})->name('contact');

Route::get('/register', function () { $title = 'Register'; return view('register',compact('title'));})->name('register');

/*
|--------------------------------------------------------------------------
| backend Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('admin-login', function () {return view('admin.login');});
Route::post('/admin-login-check', 'AdminController@LoginCheck')->name('AdminLoginCheck');
Route::get('/AdminLogout', 'AdminController@Logout')->name('AdminLogout');
Route::post('/admin-user-register', 'AdminController@AdminRegister')->name('AdminUserRegister');

Route::group(['middleware' => 'CheckAdmin'], function () {

    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/basic-information', 'HomeController@BasicInformation')->name('BasicInformation');
    Route::post('/basic-information', 'HomeController@BasicInformationUpdate')->name('BasicInformationUpdate');

    Route::get('/slider-manage/{data?}', 'HomeController@SliderManage')->name('SliderManage');
    Route::get('/slider-manage-status', 'HomeController@SliderManageStatus')->name('SliderManageStatus');
    Route::get('/slider-manage-delete', 'HomeController@SliderManageDelete')->name('SliderManageDelete');
    Route::post('/slider-manage', 'HomeController@SliderManageAdd')->name('SliderManageAdd');
    Route::post('/slider-manage-update', 'HomeController@SliderManageUpdate')->name('SliderManageUpdate');

    Route::get('/our-service/{data?}', 'AboutController@OurService')->name('OurService');
    Route::post('/our-service', 'AboutController@OurServiceAdd')->name('OurServiceAdd');
    Route::get('/our-service-status', 'AboutController@OurServiceStatus')->name('OurServiceStatus');
    Route::get('/our-service-delete', 'AboutController@OurServiceDelete')->name('OurServiceDelete');
    Route::post('/our-service-update', 'AboutController@OurServiceUpdate')->name('OurServiceUpdate');

});