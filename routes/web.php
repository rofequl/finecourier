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

Route::get('/shipping-rate', 'QuotationController@ShippingRate')->name('ShippingRate');
Route::post('/search-shipping-rate', 'QuotationController@ShippingRateSearch')->name('ShippingRateSearch');
Route::post('/search-shipping-rate-domestic', 'QuotationController@ShippingRateSearchDomestic')->name('ShippingRateSearchDomestic');

Route::get('faq', 'FrontendController@faq')->name('faq');
Route::post('faq', 'FrontendController@AddFaq')->name('AddFaq');

Route::get('/track_trace', function () { $title = 'Track & Trace'; return view('track_trace',compact('title'));})->name('track_trace');

Route::get('/quote', function () { $title = 'Request Quote'; return view('quote',compact('title'));})->name('quote');

Route::get('/single_news', function () { $title = 'News Details'; return view('single_news',compact('title'));})->name('single_news');

Route::group(['middleware' => 'CheckUser'], function () {

    Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');

    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile-update', 'UserController@ProfileUpdate')->name('ProfileUpdate');

    Route::get('/address', 'UserController@address')->name('address');
    Route::post('select-address-id', 'UserController@SelectAddressId')->name('SelectAddressId');
    Route::post('/address-add', 'UserController@AddressAdd')->name('AddressAdd');
    Route::post('/address-update', 'UserController@AddressUpdate')->name('AddressUpdate');
    Route::get('/address-delete', 'UserController@AddressDelete')->name('AddressDelete');

    Route::get('/prepare-shipment', 'UserController@PrepareShipment')->name('PrepareShipment');
    Route::post('/select-address', 'UserController@SelectAddress')->name('SelectAddress');
    Route::post('/select-address-all', 'UserController@SelectAddressAll')->name('SelectAddressAll');
    Route::post('prepare-shipment-add', 'QuotationController@PrepareShipmentAdd')->name('PrepareShipmentAdd');
    Route::post('prepare-shipment-submit', 'QuotationController@PrepareShipmentSubmit')->name('PrepareShipmentSubmit');
    Route::get('prepare-shipment-delete', 'QuotationController@PrepareShipmentDelete')->name('PrepareShipmentDelete');

    Route::get('prepare-shipment-edit/{id}', 'QuotationController@PrepareShipmentEdit')->name('PrepareShipmentEdit');
    Route::get('prepare-shipment-view', 'QuotationController@PrepareShipmentView')->name('PrepareShipmentView');
    Route::post('prepare-shipment-done', 'QuotationController@PrepareShipmentDone')->name('PrepareShipmentDone');

    Route::get('shipment-label/{data}', 'QuotationController@ShipmentLabel')->name('ShipmentLabel');


});

/*
|--------------------------------------------------------------------------
| backend Admin Routes
|--------------------------------------------------------------------------
*/

Route::post('select-state', 'ShippingpriceController@SelectState')->name('SelectState');
Route::post('select-city', 'ShippingpriceController@SelectCity')->name('SelectCity');
Route::post('select-country-code', 'ShippingpriceController@SelectCountryCode')->name('SelectCountryCode');

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

    Route::get('/admin-Country', 'ShippingpriceController@AdminCountry')->name('AdminCountry');
    Route::post('/admin-Country-change', 'ShippingpriceController@AdminCountryChange')->name('AdminCountryChange');


    Route::get('/admin-international/{data?}', 'ShippingpriceController@AdminInternational')->name('AdminInternational');
    Route::post('/admin-international', 'ShippingpriceController@AdminInternationalAdd')->name('AdminInternationalAdd');
    Route::get('/admin-international-delete', 'ShippingpriceController@AdminInternationalDelete')->name('AdminInternationalDelete');

    Route::get('/admin-domestic/{data?}', 'ShippingpriceController@AdminDomestic')->name('AdminDomestic');
    Route::post('/admin-domestic', 'ShippingpriceController@AdminDomesticAdd')->name('AdminDomesticAdd');
    Route::get('/admin-domestic-delete', 'ShippingpriceController@AdminDomesticDelete')->name('AdminDomesticDelete');


});
