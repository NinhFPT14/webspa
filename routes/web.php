<?php

use Illuminate\Support\Facades\Route;


// HomeController
Route::get('/','Fontend\HomeController@home')->name('home');
Route::get('/lien-he','Fontend\HomeController@contact')->name('contact');
Route::get('/gioi-thieu','Fontend\HomeController@about')->name('about');

//ProductController
Route::get('/san-pham','Fontend\ProductController@product')->name('product');
Route::get('/chi-tiet-san-pham','Fontend\ProductController@detailProduct')->name('detailProduct');

//ServiceController
Route::get('/dich-vu','Fontend\ServiceController@service')->name('service');
Route::get('/chi-tiet-dich-vu','Fontend\ServiceController@detailService')->name('detailService');

//BlogController
Route::get('/bai-viet','Fontend\BlogController@blog')->name('blog');
Route::get('/chi-tiet-bai-viet','Fontend\BlogController@detailBlog')->name('detailBlog');

//LoginController
Route::get('/dang-nhap','Fontend\LoginController@login')->name('login');
Route::get('/dang-ky','Fontend\LoginController@register')->name('register');
Route::get('/tai-khoan-cua-toi','Fontend\LoginController@myAccount')->name('myAccount');

//cartController

Route::get('/cart','Fontend\CartController@cart')->name('cart');


//checkoutcontroller
Route::get('/checkout','Fontend\CheckoutController@checkout')->name('checkout');

//appointmentcontroller
Route::get('/appointment','Fontend\AppointmentController@appointment')->name('appointment');

Route::get('dashboard',function(){
    return view('backend.dashboard');
})->name('dashboard');




//CategoryController 
Route::get('tao-danh-muc','Backend\CategoryController@add')->name('addCategory');
Route::get('luu-danh-muc','Backend\CategoryController@store')->name('storeCategory');
//SlideController
Route::get('tao-slide','Backend\SlideController@add')->name('addSlide');
Route::post('luu-slide','Backend\SlideController@store')->name('storeSlide');
Route::get('danh-sach-slide','Backend\SlideController@list')->name('listSlide');

