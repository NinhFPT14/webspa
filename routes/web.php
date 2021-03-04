<?php

use Illuminate\Support\Facades\Route;


// HomeController
Route::get('/','Frontend\HomeController@home')->name('home');
Route::get('/lien-he','Frontend\HomeController@contact')->name('contact');
Route::get('/gioi-thieu','Frontend\HomeController@about')->name('about');

//ProductController
Route::get('/san-pham','Frontend\ProductController@product')->name('product');
Route::get('/chi-tiet-san-pham/{slug}/{id}','Frontend\ProductController@detailProduct')->name('detailProduct');

//ServiceController
Route::get('/dich-vu','Frontend\ServiceController@service')->name('service');
Route::get('/chi-tiet-dich-vu','Frontend\ServiceController@detailService')->name('detailService');

//BlogController
Route::get('/bai-viet','Frontend\BlogController@blog')->name('blog');
Route::get('/chi-tiet-bai-viet','Frontend\BlogController@detailBlog')->name('detailBlog');

//LoginController
Route::get('/dang-nhap','Frontend\LoginController@login')->name('login');
Route::get('/dang-ky','Frontend\LoginController@register')->name('register');
Route::get('/tai-khoan-cua-toi','Frontend\LoginController@myAccount')->name('myAccount');

//cartController

Route::get('/cart','Frontend\CartController@cart')->name('cart');


//checkoutcontroller
Route::get('/checkout','Frontend\CheckoutController@checkout')->name('checkout');

//appointmentcontroller
Route::get('/appointment','Frontend\AppointmentController@appointment')->name('appointment');

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
Route::get('trang-thai-slide/{id}/{status}','Backend\SlideController@status')->name('statusSlide');
//FooterController
Route::get('tao-footer','Backend\FooterController@add')->name('addFooter');
Route::post('luu-footer','Backend\FooterController@save')->name('saveFooter');
Route::get('danh-sach-footer','Backend\FooterController@list')->name('listFooter');
Route::get('xoa-footer/{id}','Backend\FooterController@delete')->name('deleteFooter');
Route::get('/sua-footer/{id}', 'Backend\FooterController@edit')->name('editFooter');
Route::post('/cap-nhat-footer/{id}', 'Backend\FooterController@update')->name('updateFooter');

// ProductController

Route::get('tao-san-pham','Backend\ProductController@add')->name('addProduct');
Route::post('luu-san-pham','Backend\ProductController@store')->name('storeProduct');
Route::get('danh-sach-san-pham','Backend\ProductController@list')->name('listProduct');
Route::get('sua-san-pham/{id}','Backend\ProductController@edit')->name('editProduct');
Route::get('xoa-san-pham/{id}','Backend\ProductController@delete')->name('deleteProduct');


//LogoController
Route::get('tao-logo','Backend\LogoController@add')->name('addLogo');
Route::post('luu-logo','Backend\LogoController@store')->name('storeLogo');
Route::get('danh-sach-logo','Backend\LogoController@list')->name('listLogo');
Route::get('xoa-logo/{id}','Backend\LogoController@delete')->name('deleteLogo');
Route::get('/sua-logo/{id}', 'Backend\LogoController@edit')->name('editLogo');
Route::post('/cap-nhat-logo/{id}', 'Backend\LogoController@update')->name('updateLogo');
Route::get('/trang-thai-logo/{id}/{status}', 'Backend\LogoController@status')->name('statusLogo');

//Dich-Vu-Controller
Route::get('/tao-dich-vu','Backend\dichvuController@add')->name('addService');
Route::post('luu-dich-vu','Backend\dichvuController@store')->name('saveService');
Route::get('/danh-sach-dich-vu','Backend\dichvuController@list')->name('listService');
Route::get('trang-thai-dich-vu/{id}/{status}','Backend\dichvuController@status')->name('statusService');
Route::get('xoa-dich-vu/{id}','Backend\dichvuController@delete')->name('deleteService');
Route::get('sua-dich-vu/{id}','Backend\dichvuController@edit')->name('editService');
Route::post('cap-nhat-dich-vu/{id}','Backend\dichvuController@update')->name('updateService');
