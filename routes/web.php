<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;



// HomeController
Route::get('/','Frontend\HomeController@home')->name('home');
Route::get('hi',function(){
    alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
return view('frontend.contact');
});
Route::get('/gioi-thieu','Frontend\HomeController@about')->name('about');

//FeedbackController
Route::get('/lien-he','Frontend\HomeController@contact')->name('contact');
Route::post('luu-feedback','Frontend\FeedbackController@save')->name('saveFeedback');
Route::get('danh-sach-feedback','Frontend\FeedbackController@list')->name('listFeedback');

//ProductController
Route::get('/san-pham/{id}','Frontend\ProductController@product')->name('product');
Route::get('/chi-tiet-san-pham/{slug}/{id}','Frontend\ProductController@detailProduct')->name('detailProduct');

//ServiceController
Route::get('dich-vu','Frontend\ServiceController@service')->name('service');
Route::get('chi-tiet-dich-vu/{slug}/{id}','Frontend\ServiceController@detailService')->name('detailService');


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
Route::get('/checkout/{id}','Frontend\CheckoutController@checkout')->name('checkout');
Route::post('/checkout-voucher/{id}','Frontend\CheckoutController@voucher')->name('voucher');

//frontend / appointmentcontroller 
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
Route::post('cap-nhat-san-pham/{id}','Backend\ProductController@update')->name('updateProduct');
Route::get('trang-thai-san-pham/{id}/{status}','Backend\ProductController@status')->name('statusProduct');


//LogoController
Route::get('tao-logo','Backend\LogoController@add')->name('addLogo');
Route::post('luu-logo','Backend\LogoController@store')->name('storeLogo');
Route::get('danh-sach-logo','Backend\LogoController@list')->name('listLogo');
Route::get('xoa-logo/{id}','Backend\LogoController@delete')->name('deleteLogo');
Route::get('/sua-logo/{id}', 'Backend\LogoController@edit')->name('editLogo');
Route::post('/cap-nhat-logo/{id}', 'Backend\LogoController@update')->name('updateLogo');
Route::get('/trang-thai-logo/{id}/{status}', 'Backend\LogoController@status')->name('statusLogo');

//Dich-Vu-Controller
Route::get('/tao-dich-vu','Backend\ServiceController@add')->name('addService');
Route::post('luu-dich-vu','Backend\ServiceController@store')->name('saveService');
Route::get('danh-sach-dich-vu','Backend\ServiceController@list')->name('listService');
Route::get('trang-thai-dich-vu/{id}/{status}','Backend\ServiceController@status')->name('statusService');
Route::get('xoa-dich-vu/{id}','Backend\ServiceController@delete')->name('deleteService');
Route::get('sua-dich-vu/{id}','Backend\ServiceController@edit')->name('editService');
Route::post('cap-nhat-dich-vu/{id}','Backend\ServiceController@update')->name('updateService');
Route::get('don-dat-lich','Backend\ServiceController@listAppointment')->name('listAppointment');
Route::get('bang-xep-lich','Backend\ServiceController@sortAppointment')->name('sortAppointment');


// Đặt lịch AppointmentController
Route::post('/gui-lich-dat','Backend\AppointmentController@save')->name('saveAppointment');


// vouchers service
Route::get('/tao-voucher-dich-vu','Backend\VoucherController@add')->name('addVoucherService');
Route::post('luu-voucher-dich-vu','Backend\VoucherController@store')->name('saveVoucherService');
Route::get('danh-sach-voucher-dich-vu','Backend\VoucherController@list')->name('listVoucherService');
Route::get('xoa-voucher/{id}','Backend\VoucherController@delete')->name('deleteVoucherService');
Route::get('/sua-voucher/{id}', 'Backend\VoucherController@edit')->name('editVoucherService');
Route::post('/cap-nhat-voucher/{id}', 'Backend\VoucherController@update')->name('updateVoucherService');
Route::get('trang-thai-voucher-dich-vu/{id}/{status}','Backend\VoucherController@status')->name('statusVoucherService');

// vouchers product
Route::get('/tao-voucher-san-pham','Backend\ProductVoucherController@add')->name('addVoucherProduct');
Route::post('luu-voucher-san-pham','Backend\ProductVoucherController@store')->name('saveVoucherProduct');
Route::get('danh-sach-voucher-san-pham','Backend\ProductVoucherController@list')->name('listVoucherProduct');
Route::get('xoa-voucher-san-pham/{id}','Backend\ProductVoucherController@delete')->name('deleteVoucherProduct');
Route::get('/sua-voucher-san-pham/{id}', 'Backend\ProductVoucherController@edit')->name('editVoucherProduct');
Route::post('/cap-nhat-voucher-san-pham/{id}', 'Backend\ProductVoucherController@update')->name('updateVoucherProduct');
Route::get('trang-thai-voucher-san-pham/{id}/{status}','Backend\ProductVoucherController@status')->name('statusVoucherProduct');

// Ghế làm locationCOntroller
Route::get('/tao-ghe','Backend\LocationController@add')->name('addLocation');
Route::post('/luu-ghe','Backend\LocationController@save')->name('saveLocation');
Route::get('/danh-sach-ghe','Backend\LocationController@list')->name('listLocation');
Route::get('/trang-thai-ghe/{id}/{status}','Backend\LocationController@status')->name('statusLocation');
Route::get('/xoa-ghe/{id}','Backend\LocationController@delete')->name('deleteLocation');
Route::get('/sua-ghe/{id}','Backend\LocationController@edit')->name('editLocation');
Route::post('/cap-nhat-ghe/{id}','Backend\LocationController@update')->name('updateLocation');

// Nhân viên Staffcontroller
Route::get('/them-nhan-vien','Backend\StaffController@add')->name('addStaff');
Route::post('/luu-nhan-vien','Backend\StaffController@save')->name('saveStaff');
Route::get('/danh-sach-nhan-vien','Backend\StaffController@list')->name('listStaff');
Route::get('/trang-thai-nhan-vien/{id}/{status}','Backend\StaffController@status')->name('statusStaff');
Route::get('/xoa-nhan-vien/{id}','Backend\StaffController@delete')->name('deleteStaff');
Route::get('/sua-nhan-vien/{id}','Backend\StaffController@edit')->name('editStaff');
Route::post('/cap-nhat-nhan-vien/{id}','Backend\StaffController@update')->name('updateStaff');

// maps
Route::get('tao-ban-do','Backend\MapController@add')->name('addMap');
Route::post('luu-ban-do','Backend\MapController@store')->name('storeMap');
Route::get('danh-sach-ban-do','Backend\MapController@list')->name('listMap');
Route::get('xoa-ban-do/{id}','Backend\MapController@delete')->name('deleteMap');
Route::get('/sua-ban-do/{id}', 'Backend\MapController@edit')->name('editMap');
Route::post('/cap-nhat-ban-do/{id}', 'Backend\MapController@update')->name('updateMap');
