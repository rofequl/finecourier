<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'FrontendController@index')->name('home');

Route::get('/login', 'FrontendController@login')->name('login');
Route::post('/login-check', 'FrontendController@LoginCheck')->name('LoginCheck');

Route::get('/register', 'FrontendController@register')->name('register');\
Route::post('/register-submit', 'FrontendController@RegisterSubmit')->name('RegisterSubmit');

Route::get('/logout', 'FrontendController@logout')->name('logout');

Route::get('/about', 'FrontendController@about')->name('about_us');

Route::get('/service', 'FrontendController@service')->name('service');

Route::get('/contact', 'FrontendController@contact')->name('contact');

Route::get('/news', 'FrontendController@news')->name('news');

Route::get('/service_sidebar', function () { $title = 'Service Sidebar'; return view('service_sidebar',compact('title'));})->name('service_sidebar');

Route::get('/single_service', function () { $title = 'Service Details'; return view('single_service',compact('title'));})->name('single_service');

Route::get('/track_trace', function () { $title = 'Track & Trace'; return view('track_trace',compact('title'));})->name('track_trace');

Route::get('/quote', function () { $title = 'Request Quote'; return view('quote',compact('title'));})->name('quote');

Route::get('/news_list', function () { $title = 'News List'; return view('news_list',compact('title'));})->name('news_list');

Route::get('/single_news', function () { $title = 'News Details'; return view('single_news',compact('title'));})->name('single_news');

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

    Route::get('/our-information', 'AboutController@OurInformation')->name('OurInformation');
    Route::post('/our-information', 'AboutController@OurInformationAdd')->name('OurInformationAdd');

    Route::get('/faq/{data?}','AboutController@faq')->name('faq');
    Route::post('/faq','AboutController@faqAdd')->name('faqAdd');
    Route::get('/faqStatus','AboutController@faqStatus')->name('faqStatus');
    Route::post('/faq-update','AboutController@faqUpdate')->name('faqUpdate');
    Route::get('/faq-delete', 'AboutController@faqDelete')->name('faqDelete');

    Route::get('/admin-contact/{data?}', 'HomeController@AdminContact')->name('AdminContact');
    Route::post('/admin-contact', 'HomeController@AdminContactAdd')->name('AdminContactAdd');
    Route::get('/admin-contact-delete', 'HomeController@AdminContactDelete')->name('AdminContactDelete');

    Route::get('/admin-testimonial/{data?}', 'HomeController@AdminTestimonial')->name('AdminTestimonial');
    Route::post('/admin-testimonial', 'HomeController@AdminTestimonialAdd')->name('AdminTestimonialAdd');
    Route::get('/admin-testimonial-status', 'HomeController@AdminTestimonialStatus')->name('AdminTestimonialStatus');
    Route::get('/admin-testimonial-delete', 'HomeController@AdminTestimonialDelete')->name('AdminTestimonialDelete');

    Route::get('/admin-sponsor/{data?}', 'HomeController@AdminSponsor')->name('AdminSponsor');
    Route::post('/admin-sponsor', 'HomeController@AdminSponsorAdd')->name('AdminSponsorAdd');
    Route::get('/admin-sponsor-delete', 'HomeController@AdminSponsorDelete')->name('AdminSponsorDelete');
    Route::post('/admin-sponsor-update', 'HomeController@AdminSponsorUpdate')->name('AdminSponsorUpdate');

    Route::get('/admin-news/{data?}', 'AboutController@AdminNews')->name('AdminNews');
    Route::post('/admin-news', 'AboutController@AdminNewsAdd')->name('AdminNewsAdd');
    Route::get('/admin-news-status', 'AboutController@AdminNewsStatus')->name('AdminNewsStatus');
    Route::get('/admin-news-delete', 'AboutController@AdminNewsDelete')->name('AdminNewsDelete');
    Route::post('/admin-news-update', 'AboutController@AdminNewsUpdate')->name('AdminNewsUpdate');

});