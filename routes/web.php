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
Route::get('/single-service/{id}', 'FrontendController@SingleService')->name('SingleService');

Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/send-us-message', 'FrontendController@SendUsMessage')->name('SendUsMessage');

Route::get('/news', 'FrontendController@news')->name('news');
Route::get('/single-news/{id}', 'FrontendController@SingleNews')->name('SingleNews');
Route::get('love-react', 'FrontendController@LoveReact');
Route::post('add-love-react', 'FrontendController@AddLoveReact');
Route::post('remove-love-react', 'FrontendController@RemoveLoveReact');
Route::post('add-news-comment', 'FrontendController@AddNewsComment')->name('AddNewsComment');

Route::get('faq', 'FrontendController@faq')->name('faq');
Route::post('faq', 'FrontendController@AddFaq')->name('AddFaq');

Route::get('/track_trace', function () { $title = 'Track & Trace'; return view('track_trace',compact('title'));})->name('track_trace');

Route::get('/quote', function () { $title = 'Request Quote'; return view('quote',compact('title'));})->name('quote');

Route::get('/single_news', function () { $title = 'News Details'; return view('single_news',compact('title'));})->name('single_news');

Route::group(['middleware' => 'CheckUser'], function () {
    Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('/profile', 'UserController@profile')->name('profile');
});

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

    Route::get('/admin-faq/{data?}','AboutController@AdminFaq')->name('AdminFaq');
    Route::get('/faqStatus','AboutController@faqStatus')->name('faqStatus');
    Route::post('/admin-faq-update','AboutController@AdminFaqUpdate')->name('AdminFaqUpdate');
    Route::get('/faq-delete', 'AboutController@faqDelete')->name('faqDelete');

    Route::get('/admin-contact/{data?}', 'HomeController@AdminContact')->name('AdminContact');
    Route::post('/admin-contact', 'HomeController@AdminContactAdd')->name('AdminContactAdd');
    Route::post('/admin-contact-update', 'HomeController@AdminContactUpdate')->name('AdminContactUpdate');
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

    Route::get('admin-world-zone/{data?}', 'QuotationController@AdminWorldZone')->name('AdminWorldZone');
    Route::post('admin-world-zone', 'QuotationController@AdminWorldZoneAdd')->name('AdminWorldZoneAdd');
    Route::post('admin-world-zone-update', 'QuotationController@AdminWorldZoneUpdate')->name('AdminWorldZoneUpdate');
    Route::get('admin-world-zone-delete', 'QuotationController@AdminWorldZoneDelete')->name('AdminWorldZoneDelete');

    Route::get('admin-country-manage/{data?}', 'QuotationController@AdminCountryManage')->name('AdminCountryManage');
    Route::post('admin-country-manage', 'QuotationController@AdminCountryManageAdd')->name('AdminCountryManageAdd');
    Route::get('admin-country-manage-delete', 'QuotationController@AdminCountryManageDelete')->name('AdminCountryManageDelete');
    Route::post('admin-country-manage-update', 'QuotationController@AdminCountryManageUpdate')->name('AdminCountryManageUpdate');

    Route::get('admin-shipping-rate/{data?}', 'QuotationController@AdminShippingRate')->name('AdminShippingRate');

});