<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

  Route::get('/','FrontendController@index')->name('front.index');
  Route::get('/doctors','FrontendController@users')->name('front.users');
  Route::get('/doctors/featured','FrontendController@featured')->name('front.featured');
  Route::get('/doctor-profile/{id}','FrontendController@user')->name('front.user');
  Route::get('/category/{slug}','FrontendController@types')->name('front.types');
  Route::get('/doctors/search/','FrontendController@search')->name('user.search');
  Route::get('/faq','FrontendController@faq')->name('front.faq');
  Route::get('/ads/{id}','FrontendController@ads')->name('front.ads');
  Route::get('/about','FrontendController@about')->name('front.about');
  Route::get('/contact','FrontendController@contact')->name('front.contact');
  Route::get('/blog','FrontendController@blog')->name('front.blog');
  Route::get('/blog/{id}','FrontendController@blogshow')->name('front.blogshow');
  Route::post('/contact','FrontendController@contactemail')->name('front.contact.submit');
  Route::post('/subscribe','FrontendController@subscribe')->name('front.subscribe.submit');
  Route::post('/doctor/contact','FrontendController@useremail')->name('front.user.submit');
  Route::get('/doctor/refresh_code','FrontendController@refresh_code');


  Route::prefix('doctor')->group(function() {
  Route::get('/dashboard', 'UserController@index')->name('user-dashboard');
  Route::get('/reset', 'UserController@resetform')->name('user-reset');
  Route::post('/reset', 'UserController@reset')->name('user-reset-submit');
  Route::get('/profile', 'UserController@profile')->name('user-profile'); 
  Route::post('/profile', 'UserController@profileupdate')->name('user-profile-update'); 
  Route::get('/forgot', 'Auth\UserForgotController@showforgotform')->name('user-forgot');
  Route::post('/forgot', 'Auth\UserForgotController@forgot')->name('user-forgot-submit');
  Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user-login');
  Route::post('/login', 'Auth\UserLoginController@login')->name('user-login-submit');
  Route::get('/register', 'Auth\UserRegisterController@showRegisterForm')->name('user-register');
  Route::post('/register', 'Auth\UserRegisterController@register')->name('user-register-submit');
  Route::get('/logout', 'Auth\UserLoginController@logout')->name('user-logout');

  Route::post('/payment', 'PaymentController@store')->name('payment.submit');
  Route::get('/payment/cancle', 'PaymentController@paycancle')->name('payment.cancle');
  Route::get('/payment/return', 'PaymentController@payreturn')->name('payment.return');

  Route::get('/publish', 'UserController@publish')->name('user-publish'); 
  Route::get('/feature', 'UserController@feature')->name('user-feature');   
  });

Route::get('finalize', 'FrontendController@finalize');
Route::post('the/genius/ocean/2441139', 'FrontendController@subscription');

  Route::post('/user/payment/notify', 'PaymentController@notify')->name('payment.notify');
  Route::post('/stripe-submit', 'StripeController@store')->name('stripe.submit');



  Route::prefix('admin')->group(function() {

  Route::get('/dashboard', 'AdminController@index')->name('admin-dashboard');
  Route::get('/profile', 'AdminController@profile')->name('admin-profile'); 
  Route::post('/profile', 'AdminController@profileupdate')->name('admin-profile-update'); 
  Route::get('/reset-password', 'AdminController@passwordreset')->name('admin-password-reset');
  Route::post('/reset-password', 'AdminController@changepass')->name('admin-password-change');
  Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin-login-submit');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin-logout');

  Route::get('/doctors', 'AdminUserController@index')->name('admin-user-index');
  Route::get('/doctors/create', 'AdminUserController@create')->name('admin-user-create');
  Route::post('/doctors/create', 'AdminUserController@store')->name('admin-user-store');
  Route::get('/doctors/edit/{id}', 'AdminUserController@edit')->name('admin-user-edit');
  Route::post('/doctors/update/{id}', 'AdminUserController@update')->name('admin-user-update');
  Route::get('/doctors/delete/{id}', 'AdminUserController@destroy')->name('admin-user-delete');
  Route::get('/doctors/status/{id1}/{id2}', 'AdminUserController@status')->name('admin-user-st');

  Route::get('/category', 'CategoryController@index')->name('admin-cat-index');
  Route::get('/category/create', 'CategoryController@create')->name('admin-cat-create');
  Route::post('/category/create', 'CategoryController@store')->name('admin-cat-store');
  Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin-cat-edit');
  Route::post('/category/update/{id}', 'CategoryController@update')->name('admin-cat-update');
  Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('admin-cat-delete');

  Route::get('/faq', 'FaqController@index')->name('admin-fq-index');
  Route::get('/faq/create', 'FaqController@create')->name('admin-fq-create');
  Route::post('/faq/create', 'FaqController@store')->name('admin-fq-store');
  Route::get('/faq/edit/{id}', 'FaqController@edit')->name('admin-fq-edit');
  Route::post('/faq/update/{id}', 'FaqController@update')->name('admin-fq-update');
  Route::post('/faqup', 'PageSettingController@faqupdate')->name('admin-faq-update');
  Route::get('/faq/delete/{id}', 'FaqController@destroy')->name('admin-fq-delete');


  Route::get('/blog', 'AdminBlogController@index')->name('admin-blog-index');
  Route::get('/blog/create', 'AdminBlogController@create')->name('admin-blog-create');
  Route::post('/blog/create', 'AdminBlogController@store')->name('admin-blog-store');
  Route::get('/blog/edit/{id}', 'AdminBlogController@edit')->name('admin-blog-edit');
  Route::post('/blog/edit/{id}', 'AdminBlogController@update')->name('admin-blog-update');  
  Route::get('/blog/delete/{id}', 'AdminBlogController@destroy')->name('admin-blog-delete'); 
  
  Route::get('/testimonial', 'PortfolioController@index')->name('admin-ad-index');
  Route::get('/testimonial/create', 'PortfolioController@create')->name('admin-ad-create');
  Route::post('/testimonial/create', 'PortfolioController@store')->name('admin-ad-store');
  Route::get('/testimonial/edit/{id}', 'PortfolioController@edit')->name('admin-ad-edit');
  Route::post('/testimonial/edit/{id}', 'PortfolioController@update')->name('admin-ad-update');  
  Route::get('/testimonial/delete/{id}', 'PortfolioController@destroy')->name('admin-ad-delete');


  Route::get('/advertise', 'AdvertiseController@index')->name('admin-adv-index');
  Route::get('/advertise/st/{id1}/{id2}', 'AdvertiseController@status')->name('admin-adv-st');
  Route::get('/advertise/create', 'AdvertiseController@create')->name('admin-adv-create');
  Route::post('/advertise/create', 'AdvertiseController@store')->name('admin-adv-store');
  Route::get('/advertise/edit/{id}', 'AdvertiseController@edit')->name('admin-adv-edit');
  Route::post('/advertise/edit/{id}', 'AdvertiseController@update')->name('admin-adv-update');  
  Route::get('/advertise/delete/{id}', 'AdvertiseController@destroy')->name('admin-adv-delete'); 

  Route::get('/page-settings/about', 'PageSettingController@about')->name('admin-ps-about');
  Route::post('/page-settings/about', 'PageSettingController@aboutupdate')->name('admin-ps-about-submit');
  Route::get('/page-settings/contact', 'PageSettingController@contact')->name('admin-ps-contact');
  Route::post('/page-settings/contact', 'PageSettingController@contactupdate')->name('admin-ps-contact-submit');



  Route::get('/social', 'SocialSettingController@index')->name('admin-social-index');
  Route::post('/social/update', 'SocialSettingController@update')->name('admin-social-update');


  Route::get('/seotools/analytics', 'SeoToolController@analytics')->name('admin-seotool-analytics');
  Route::post('/seotools/analytics/update', 'SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
  Route::get('/seotools/keywords', 'SeoToolController@keywords')->name('admin-seotool-keywords');
  Route::post('/seotools/keywords/update', 'SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');

  Route::get('/general-settings/logo', 'GeneralSettingController@logo')->name('admin-gs-logo');
  Route::post('/general-settings/logo', 'GeneralSettingController@logoup')->name('admin-gs-logoup');

  Route::get('/general-settings/favicon', 'GeneralSettingController@fav')->name('admin-gs-fav');
  Route::post('/general-settings/favicon', 'GeneralSettingController@favup')->name('admin-gs-favup');


  Route::get('/general-settings/loader', 'GeneralSettingController@load')->name('admin-gs-load');
  Route::post('/general-settings/loader', 'GeneralSettingController@loadup')->name('admin-gs-loadup');

  Route::get('/general-settings/payments', 'GeneralSettingController@payments')->name('admin-gs-payments');
  Route::post('/general-settings/payments', 'GeneralSettingController@paymentsup')->name('admin-gs-paymentsup');

  Route::get('/general-settings/contents', 'GeneralSettingController@contents')->name('admin-gs-contents');
  Route::post('/general-settings/contents', 'GeneralSettingController@contentsup')->name('admin-gs-contentsup');

  Route::get('/general-settings/bgimg', 'GeneralSettingController@bgimg')->name('admin-gs-bgimg');
  Route::post('/general-settings/bgimgup', 'GeneralSettingController@bgimgup')->name('admin-gs-bgimgup');

  Route::get('/general-settings/about', 'GeneralSettingController@about')->name('admin-gs-about');
  Route::post('/general-settings/about', 'GeneralSettingController@aboutup')->name('admin-gs-aboutup');

  Route::get('/general-settings/address', 'GeneralSettingController@address')->name('admin-gs-address');
  Route::post('/general-settings/address', 'GeneralSettingController@addressup')->name('admin-gs-addressup');

  Route::get('/general-settings/footer', 'GeneralSettingController@footer')->name('admin-gs-footer');
  Route::post('/general-settings/footer', 'GeneralSettingController@footerup')->name('admin-gs-footerup');

  Route::get('/general-settings/bg-info', 'GeneralSettingController@bginfo')->name('admin-gs-bginfo');
  Route::post('/general-settings/bg-info', 'GeneralSettingController@bginfoup')->name('admin-gs-bginfoup');

  Route::get('/subscribers', 'SubscriberController@index')->name('admin-subs-index');
  Route::get('/subscribers/download', 'SubscriberController@download')->name('admin-subs-download');

  Route::get('/languages', 'LanguageController@lang')->name('admin-lang-index');
  Route::post('/languages', 'LanguageController@langup')->name('admin-lang-submit');
  });
