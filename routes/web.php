<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


    Route::get('/form-dang-nhap','Frontend\LoginController@login')->name('login');
    Route::post('/dang-nhap','Frontend\LoginController@getLogin')->name('getLogin');
    Route::get('/dang-xuat','Frontend\LoginController@logout')->name('logout');
    
    // HomeController
    Route::get('/','Frontend\HomeController@home')->name('home');
    Route::get('hi',function(){
        alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
    return view('frontend.contact');
    });
    Route::get('/gioi-thieu','Frontend\HomeController@about')->name('about');

    //FeedbackController
    Route::get('/phan-hoi','Frontend\FeedbackController@contact')->name('contact');
    Route::post('luu-phan-hoi','Frontend\FeedbackController@apiSave')->name('feedback.apiSave');

    //ProductController
    Route::get('/san-pham/{id}','Frontend\ProductController@product')->name('product');
    Route::get('/chi-tiet-san-pham/{slug}/{id}','Frontend\ProductController@detailProduct')->name('detailProduct');
    Route::post('/tim-kiem-san-pham','Frontend\ProductController@search')->name('product.search.user');
    Route::get('/trang-dat-san-pham','Frontend\ProductController@oderProduct')->name('product.oder');
    Route::post('/lay-thong-tin-san-pham','Frontend\ProductController@oderProductAdd')->name('product.oder.add');
    Route::post('/dat-san-pham','Frontend\ProductController@oderSave')->name('product.oder.save');
    Route::get('/danh-sach-don-dat-san-pham','Frontend\ProductController@oderList')->name('product.oder.list');
    Route::post('/huy-don-dat-hang','Frontend\ProductController@oderDelete')->name('product.oder.delete');
    Route::post('/chi-tiet-don-dat-hang','Frontend\ProductController@orderDetail')->name('product.order.detail');
    //ServiceController
    Route::get('dich-vu/{id}','Frontend\ServiceController@service')->name('service');
    Route::post('tim-kiem-dich-vu','Frontend\ServiceController@search')->name('service.search.user');
    Route::get('chi-tiet-dich-vu/{slug}/{id}','Frontend\ServiceController@detailService')->name('detailService');

    //BlogController-Font-end
    Route::get('/trang-bai-viet','Frontend\BlogController@list')->name('listBlog');
    Route::get('/chi-tiet-bai-viet/{id}','Frontend\BlogController@detailBlog')->name('detailBlog');
    Route::get('danh-muc-bai-viet/{id}','Frontend\BlogController@categoryBlog')->name('danhmucbaiviet');
    Route::get('/tim-kiem-bai-viet-index','Frontend\BlogController@search')->name('blog.search');




    //LoginController

    //cartController
    Route::get('/gio-hang','Frontend\CartController@cart')->name('cart');
    Route::get('/them-vao-gio-hang/{id}','Frontend\CartController@add')->name('cart.add');
    Route::post('/them-nhieu-san-pham/{id}','Frontend\CartController@addMuch')->name('cart.addMuch');
    Route::post('/xoa-gio-hang','Frontend\CartController@delete')->name('cart.delete');
    Route::post('/cap-nhat-gio-hang','Frontend\CartController@update')->name('cart.update');

    //Đặt lịch 
    Route::group(['prefix' => 'dat-lich'], function() {
        Route::get('/','Frontend\AppointmentController@appointment')->name('appointment'); // hiển thị bảng đăt lịch
        Route::post('/tao-don-dat-lich','Frontend\AppointmentController@apiSave')->name('appointment.apiSave'); // nhận & sử lý thông tin từ bảng đặt lịch
        Route::post('/xac-nhan-otp','Frontend\AppointmentController@apiconfirmOtp')->name('appointment.apiconfirmOtp');  // Xác nhận OTP
        Route::get('/danh-sach-don','Frontend\AppointmentController@listBooking')->name('appointment.listBooking');// hiển thị đơn hàng vừa đặt từ phía khách hàng
        Route::post('/huy-don-dat-lich','Frontend\AppointmentController@apiCancel')->name('appointment.apiCancel');
        
        Route::post('/doi-lich-lam','Frontend\AppointmentController@apiConvert')->name('appointment.apiConvert');
        Route::post('/otp-huy-va-chuyen-lich','Frontend\AppointmentController@apiOtp')->name('appointment.apiOtp');
        Route::post('/chi-tiet-don','Frontend\AppointmentController@apiDetail')->name('appointment.apiDetail');
    });


    //Đổi gửi otp đổi mật khẩu và quên mật khẩu
    Route::post('/gui-otp-doi-mat-khau-admin','Backend\LoginController@otp')->name('login.otp');
    Route::post('/xac-nhan-so-dien-thoai','Backend\LoginController@confirmPhone')->name('login.confirm.phone');
    Route::post('/cap-lai-mat-khau','Backend\LoginController@renewPassword')->name('login.renew.password');
    
Route::group(['prefix' => 'admin','middleware' => 'CheckAdmin'], function() {
    Route::get('/',function(){
        return view('backend.dashboard');
    })->name('dashboard');
    Route::get('danh-sach-phan-hoi','Backend\FeedbackController@list')->name('listFeedback');
    Route::post('chi-tiet-phan-hoi','Backend\FeedbackController@detail')->name('feedback.detail');


    //CategoryController
    Route::group(['prefix' => 'danh-muc'], function() {
        Route::get('/trang-tao','Backend\CategoryController@add')->name('addCategory');
        Route::post('/tao-moi','Backend\CategoryController@store')->name('storeCategory');
        Route::get('/danh-sach/{type}','Backend\CategoryController@list')->name('listCategory');
        Route::get('/thay-doi-trang-thai/{id}/{status}','Backend\CategoryController@status')->name('statusCategory');
        Route::get('/xoa/{id}','Backend\CategoryController@delete')->name('deleteCategory');
        Route::get('/trang-sua/{id}','Backend\CategoryController@edit')->name('editCategory');
        Route::post('/cap-nhat/{id}','Backend\CategoryController@update')->name('updateCategory');
        Route::post('/tim-kiem-danh-muc/{type}','Backend\CategoryController@search')->name('category.search');
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
        Route::post('/tim-kiem-san-pham','Backend\ProductController@search')->name('product.search');

        // oder
        Route::get('/danh-sach-don-dat-hang','Backend\ProductController@listOrder')->name('product.order.admin');
        Route::post('/doi-trang-thai-don-hang','Backend\ProductController@editStatus')->name('product.edit.admin');
        Route::post('/tim-kiem-don-hang','Backend\ProductController@searchOrder')->name('product.order.search');
        Route::get('/trang-sua-don-hang/{id}','Backend\ProductController@editOrder')->name('product.order.edit');
        Route::post('/them-sam-pham/{id}','Backend\ProductController@addProductOrder')->name('product.order.add');
        Route::get('/xoa-sam-pham/{id}/{productOder}','Backend\ProductController@deleteProductOrder')->name('product.order.delete');
        Route::post('/sua-thong-tin-dat-hang/{id}','Backend\ProductController@updateOrder')->name('product.order.update');
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
        Route::post('/tim-kiem-dich-vu','Backend\ServiceController@search')->name('service.search');


        Route::get('/danh-sach-dat-lich','Backend\AppointmentController@listAppointment')->name('listAppointment');
        Route::post('/chi-tiet-don-dat-lich','Backend\AppointmentController@detailAppointment')->name('detailAppointment');
        Route::post('get-data-by-id', 'Backend\AppointmentController@apiGetDataById')->name('appointment.getDataById');
        Route::get('/bang-xep-lich','Backend\AppointmentController@listSortAppointment')->name('listSortAppointment');
        Route::post('/tim-kiem-don-theo-thoi-gian','Backend\AppointmentController@searchTimeAppointment')->name('searchTimeAppointment');
        Route::post('/xac-nhan-don','Backend\AppointmentController@confirm')->name('confirmAppointment');
        Route::get('/sua-don-dat-lich/{id}','Backend\AppointmentController@edit')->name('editAppointment');
        Route::post('/xep-lich-lam/{id}','Backend\AppointmentController@sortAppointment')->name('sortAppointment');
        Route::get('/huy-lich-lam/{id}','Backend\AppointmentController@cancelAppointment')->name('cancelAppointment');

        Route::get('/list-ghe-lam','Backend\AppointmentController@listSit')->name('listSit');
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
        Route::post('/tim-kiem','Backend\VoucherController@search')->name('VoucherService.search');
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
        Route::post('/tim-kiem','Backend\LocationController@search')->name('location.search');
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
        Route::post('/tim-kiem','Backend\StaffController@search')->name('staff.search');
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

    // đổi mật khẩu -- route gửi mã otp ở trên name route "login.otp"
        Route::post('/xac-thuc-otp-doi-mat-khau-admin','Backend\LoginController@confirmOtp')->name('login.confirm.otp');
        Route::post('/doi-mat-khau-admin','Backend\LoginController@password')->name('login.password');
    
        //BlogController-Back-End
    Route::group(['prefix' => 'bai-viet'], function() {
        Route::get('/','BackEnd\BlogController@index')->name('listBaiviet');
        Route::get('/thay-doi-trang-thai/{id}/{status}','Backend\BlogController@status')->name('statusBaiviet');
        Route::get('/tao-moi','BackEnd\BlogController@create')->name('addBaiviet');
        Route::post('/luu-tao-moi','Backend\BlogController@store')->name('storeBaiviet');
        Route::get('/xoa/{id}','Backend\BlogController@destroy')->name('deleteBaiviet');
        Route::get('/trang-edit/{id}','Backend\BlogController@edit')->name('editBaiviet');
        Route::post('/cap-nhat/{id}','Backend\BlogController@update')->name('updateBaiviet');
        Route::post('/tim-kiem-bai-viet','Backend\BlogController@search')->name('baiviet.search');

        
    });

});

