<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


    Route::get('/form-dang-nhap','Frontend\LoginController@login')->name('login');
    Route::post('/dang-nhap','Frontend\LoginController@getLogin')->name('getLogin');
    Route::get('/dang-xuat','Frontend\LoginController@logout')->name('logout');

Route::group(['middleware' => ['CheckUser']], function () {
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
    
    Route::get('/tai-khoan-cua-toi','Frontend\LoginController@myAccount')->name('myAccount');

    //cartController
    Route::get('/cart','Frontend\CartController@cart')->name('cart');

    //Đặt lịch
    Route::group(['prefix' => 'dat-lich'], function() {
        Route::get('/','Frontend\AppointmentController@appointment')->name('appointment');
        Route::post('/tao-moi','Frontend\AppointmentController@save')->name('appointment.save');
        Route::get('/xac-nhan/{token}/{id}','Frontend\AppointmentController@confirm')->name('appointment.confirm');
        Route::post('/luu-xac-nhan/{id}','Frontend\AppointmentController@saveConfirm')->name('appointment.saveConfirm');
        Route::post('/ma-giam-gia/{id}','Frontend\AppointmentController@voucher')->name('appointment.voucher');
        Route::get('/trang-nhap-otp/{token}/{id}','Frontend\AppointmentController@otp')->name('appointment.otp');
        Route::post('/kiem-tra-otp/{id}','Frontend\AppointmentController@confirmOtp')->name('appointment.confirmOtp');
        Route::get('/danh-sach-don','Frontend\AppointmentController@listBooking')->name('appointment.listBooking');
    });


});

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Route::view('/demo-validate', 'demo-form');
Route::post('/demo-validate', function(Request $request){
    $validate = Validator::make($request->all(), [
        'name'=> 'required|min:4'  
      ]);
    if($validate->fails()){
        return json_encode([
            'status' => false,
            'messages' => $validate->errors()
        ]);
    }
    return 'done';
});


Route::group(['prefix' => 'admin','middleware' => 'CheckAdmin'], function() {
    Route::get('/',function(){
        return view('backend.dashboard');
    })->name('dashboard');

    //CategoryController
    Route::group(['prefix' => 'danh-muc'], function() {
        Route::get('/trang-tao','Backend\CategoryController@add')->name('addCategory');
        Route::post('/tao-moi','Backend\CategoryController@store')->name('storeCategory');
        Route::get('/danh-sach/{type}','Backend\CategoryController@list')->name('listCategory');
        Route::get('/thay-doi-trang-thai/{id}/{status}','Backend\CategoryController@status')->name('statusCategory');
        Route::get('/xoa/{id}','Backend\CategoryController@delete')->name('deleteCategory');
        Route::get('/trang-sua/{id}','Backend\CategoryController@edit')->name('editCategory');
        Route::post('/cap-nhat/{id}','Backend\CategoryController@update')->name('updateCategory');
    });

    //SlideController
    Route::group(['prefix' => 'slide'], function() {
        Route::get('/trang-tao','Backend\SlideController@add')->name('addSlide');
        Route::post('/tao-moi','Backend\SlideController@store')->name('storeSlide');
        Route::get('/danh-sach','Backend\SlideController@list')->name('listSlide');
        Route::get('/xoa/{id}','Backend\SlideController@delete')->name('deleteSlide');
        Route::get('/trang-sua/{id}', 'Backend\SlideController@edit')->name('editSlide');
        Route::post('/cap-nhat/{id}', 'Backend\SlideController@update')->name('updateSlide');
        Route::get('/thay-doi-trang-thai/{id}/{status}','Backend\SlideController@status')->name('statusSlide');
    });

    //FooterController
    Route::group(['prefix' => 'footer'], function() {
        Route::get('/trang-tao','Backend\FooterController@add')->name('addFooter');
        Route::post('/tao-moi','Backend\FooterController@save')->name('saveFooter');
        Route::get('/danh-sach','Backend\FooterController@list')->name('listFooter');
        Route::get('/xoa/{id}','Backend\FooterController@delete')->name('deleteFooter');
        Route::get('/trang-sua/{id}', 'Backend\FooterController@edit')->name('editFooter');
        Route::post('/cap-nhat/{id}', 'Backend\FooterController@update')->name('updateFooter');
    });

    // ProductController
    Route::group(['prefix' => 'san-pham'], function() {
        Route::get('/trang-tao','Backend\ProductController@add')->name('addProduct');
        Route::post('/tao-moi','Backend\ProductController@store')->name('storeProduct');
        Route::get('/danh-sach','Backend\ProductController@list')->name('listProduct');
        Route::get('/trang-sua/{id}','Backend\ProductController@edit')->name('editProduct');
        Route::get('/xoa/{id}','Backend\ProductController@delete')->name('deleteProduct');
        Route::post('/cap-nhat/{id}','Backend\ProductController@update')->name('updateProduct');
        Route::get('/thay-doi-trang-thai/{id}/{status}','Backend\ProductController@status')->name('statusProduct');
    });

    //LogoController
    Route::group(['prefix' => 'logo'], function() {
        Route::get('/trang-tao','Backend\LogoController@add')->name('addLogo');
        Route::post('/tao-moi','Backend\LogoController@store')->name('storeLogo');
        Route::get('/danh-sach','Backend\LogoController@list')->name('listLogo');
        Route::get('/xoa/{id}','Backend\LogoController@delete')->name('deleteLogo');
        Route::get('/trang-sua/{id}', 'Backend\LogoController@edit')->name('editLogo');
        Route::post('/cap-nhat/{id}', 'Backend\LogoController@update')->name('updateLogo');
        Route::get('/thay-doi-trang-thai/{id}/{status}', 'Backend\LogoController@status')->name('statusLogo');
    });
    
    //Dich-Vu-Controller
    Route::group(['prefix' => 'dich-vu'], function() {
        Route::get('/trang-tao','Backend\ServiceController@add')->name('addService');
        Route::post('/tao-moi','Backend\ServiceController@store')->name('saveService');
        Route::get('/danh-sach','Backend\ServiceController@list')->name('listService');
        Route::get('/thay-doi-trang-thai/{id}/{status}','Backend\ServiceController@status')->name('statusService');
        Route::get('/xoa/{id}','Backend\ServiceController@delete')->name('deleteService');
        Route::get('/trang-sua/{id}','Backend\ServiceController@edit')->name('editService');
        Route::post('/cap-nhat/{id}','Backend\ServiceController@update')->name('updateService');
        Route::post('get-data-by-id', 'Backend\AppointmentController@apiGetDataById')->name('appointment.getDataById');
        Route::get('/bang-xep-lich','Backend\AppointmentController@sortAppointment')->name('sortAppointment');
        Route::post('/tim-kiem-don-theo-thoi-gian','Backend\AppointmentController@searchTimeAppointment')->name('searchTimeAppointment');
        Route::post('/xac-nhan-don','Backend\AppointmentController@confirm')->name('confirmAppointment');
    });

    // vouchers service
    Route::group(['prefix' => 'ma-giam-gia-dich-vu'], function() {
        Route::get('/trang-tao','Backend\VoucherController@add')->name('addVoucherService');
        Route::post('/tao-moi','Backend\VoucherController@store')->name('saveVoucherService');
        Route::get('/danh-sach','Backend\VoucherController@list')->name('listVoucherService');
        Route::get('/xoa/{id}','Backend\VoucherController@delete')->name('deleteVoucherService');
        Route::get('/trang-sua/{id}', 'Backend\VoucherController@edit')->name('editVoucherService');
        Route::post('/cap-nhat/{id}', 'Backend\VoucherController@update')->name('updateVoucherService');
        Route::get('/thay-doi-trang-thai/{id}/{status}','Backend\VoucherController@status')->name('statusVoucherService');
    });

    // vouchers product
    Route::group(['prefix' => 'ma-giam-gia-san-pham'], function() {
        Route::get('/trang-tao','Backend\ProductVoucherController@add')->name('addVoucherProduct');
        Route::post('/tao-moi','Backend\ProductVoucherController@store')->name('saveVoucherProduct');
        Route::get('/danh-sach','Backend\ProductVoucherController@list')->name('listVoucherProduct');
        Route::get('/xoa/{id}','Backend\ProductVoucherController@delete')->name('deleteVoucherProduct');
        Route::get('/trang-sua/{id}', 'Backend\ProductVoucherController@edit')->name('editVoucherProduct');
        Route::post('/cap-nhat/{id}', 'Backend\ProductVoucherController@update')->name('updateVoucherProduct');
        Route::get('/thay-doi-trang-thai/{id}/{status}','Backend\ProductVoucherController@status')->name('statusVoucherProduct');
    });

    // Ghế làm locationCOntroller
    Route::group(['prefix' => 'ghe-lam'], function() {
        Route::get('/trang-tao','Backend\LocationController@add')->name('addLocation');
        Route::post('/tao-moi','Backend\LocationController@save')->name('saveLocation');
        Route::get('/danh-sach','Backend\LocationController@list')->name('listLocation');
        Route::get('/thay-doi-trang-thai/{id}/{status}','Backend\LocationController@status')->name('statusLocation');
        Route::get('/xoa/{id}','Backend\LocationController@delete')->name('deleteLocation');
        Route::get('/trang-sua/{id}','Backend\LocationController@edit')->name('editLocation');
        Route::post('/cap-nhat/{id}','Backend\LocationController@update')->name('updateLocation');
    });

    // Nhân viên Staffcontroller
    Route::group(['prefix' => 'nhan-vien'], function() {
        Route::get('/trang-tao','Backend\StaffController@add')->name('addStaff');
        Route::post('/tao-moi','Backend\StaffController@save')->name('saveStaff');
        Route::get('/danh-sach','Backend\StaffController@list')->name('listStaff');
        Route::get('/thay-doi-trang-thai/{id}/{status}','Backend\StaffController@status')->name('statusStaff');
        Route::get('/xoa/{id}','Backend\StaffController@delete')->name('deleteStaff');
        Route::get('/trang-sua/{id}','Backend\StaffController@edit')->name('editStaff');
        Route::post('/cap-nhat/{id}','Backend\StaffController@update')->name('updateStaff');
    });

    // maps
    Route::group(['prefix' => 'ban-do'], function() {
        Route::get('/trang-tao','Backend\MapController@add')->name('addMap');
        Route::post('/tao-moi','Backend\MapController@store')->name('storeMap');
        Route::get('/danh-sach','Backend\MapController@list')->name('listMap');
        Route::get('/xoa/{id}','Backend\MapController@delete')->name('deleteMap');
        Route::get('/trang-sua/{id}', 'Backend\MapController@edit')->name('editMap');
        Route::post('/cap-nhat/{id}', 'Backend\MapController@update')->name('updateMap');
    });

    


});

