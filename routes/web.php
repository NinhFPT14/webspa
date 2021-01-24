<?php

use Illuminate\Support\Facades\Route;

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


