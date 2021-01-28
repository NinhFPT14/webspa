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
Route::post('luu-danh-muc','Backend\CategoryController@store')->name('storeCategory');
Route::get('danh-sach-danh-muc/{type}','Backend\CategoryController@list')->name('listCategory');
Route::get('trang-thai-danh-muc/{id}/{status}','Backend\CategoryController@status')->name('statusCategory');
Route::get('xoa-danh-muc/{id}','Backend\CategoryController@delete')->name('deleteCategory');
Route::get('sua-danh-muc/{id}','Backend\CategoryController@edit')->name('editCategory');
Route::post('cap-nhat-danh-muc/{id}','Backend\CategoryController@update')->name('updateCategory');
//SlideController
Route::get('tao-slide','Backend\SlideController@add')->name('addSlide');
Route::post('luu-slide','Backend\SlideController@store')->name('storeSlide');
Route::get('danh-sach-slide','Backend\SlideController@list')->name('listSlide');
Route::get('xoa-slide/{id}','Backend\SlideController@delete')->name('deleteSlide');
Route::get('/sua-slide/{id}', 'Backend\SlideController@edit')->name('editSlide');
Route::post('/cap-nhat-slide/{id}', 'Backend\SlideController@update')->name('updateSlide');
//FooterController
Route::get('tao-footer','Backend\FooterController@add')->name('addFooter');
Route::post('luu-footer','Backend\FooterController@save')->name('saveFooter');
Route::get('danh-sach-footer','Backend\FooterController@list')->name('listFooter');
Route::get('xoa-footer/{id}','Backend\FooterController@delete')->name('deleteFooter');
Route::get('/sua-footer/{id}', 'Backend\FooterController@edit')->name('editFooter');
Route::post('/cap-nhat-footer/{id}', 'Backend\FooterController@update')->name('updateFooter');