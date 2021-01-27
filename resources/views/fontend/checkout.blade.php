@extends('fontEnd.layouts.master')
@section('title')
Thanh Toán
@endsection
@section('content')
<!--Fontawesome-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index-5.html">Trang Chủ</a></li>
                        <li><a href="checkout.html">Thanh Toán</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->


<!--Checkout page section-->
<div class="Checkout_section">
   <div class="container">
        <div class="row">
           <div class="col-12">
               
           </div>
        </div>
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form action="#">
                        <h3>Thông Tin Thanh Toán</h3>
                        <div class="row">

                          
                           
                            <div class="col-12 mb-20">
                                <label>Tên</label>
                                <input type="text">     
                            </div>
                           

                            <div class="col-12 mb-20">
                                <label>Địa Chỉ  <span>*</span></label>
                                <input placeholder="Mời nhập thông tin.." type="text">     
                            </div>
                           
                           
                           
                            <div class="col-lg-6 mb-20">
                                <label>Số Điện Thoại<span>*</span></label>
                                <input type="text"> 

                            </div> 
                             <div class="col-lg-6 mb-20">
                                <label> Email    <span>*</span></label>
                                  <input type="text"> 

                            </div> 
                           
                          
                            <div class="col-12">
                                <div class="order-notes">
                                     <label for="order_note">Ghi Chú</label>
                                    <textarea id="order_note" placeholder="...."></textarea>
                                </div>    
                            </div>     	    	    	    	    	    	    
                        </div>
                    </form>    
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="#">    
                        <h3>Chi Tiết Thanh Toán</h3> 
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Handbag  fringilla <strong> × 2</strong></td>
                                        <td> $165.00</td>
                                    </tr>
                                    <tr>
                                        <td>  Handbag  justo	 <strong> × 2</strong></td>
                                        <td> $50.00</td>
                                    </tr>
                                    <tr>
                                        <td>  Handbag elit	<strong> × 2</strong></td>
                                        <td> $50.00</td>
                                    </tr>
                                    <tr>
                                        <td> Handbag Rutrum	 <strong> × 1</strong></td>
                                        <td> $50.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tổng tiền tạm tính</th>
                                        <td>$215.00</td>
                                    </tr>
                                    <tr>
                                        <th>Phí gửi hàng</th>
                                        <td><strong>$5.00</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Tổng Thanh Toán</th>
                                        <td><strong>$220.00</strong></td>
                                    </tr>
                                </tfoot>
                            </table>     
                        </div>
                        <div class="payment_method">
                           <div class="panel-default">
                                <input id="payment" name="check_method" type="radio" data-target="createp_account" />
                                <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Thanh Toán Khi Nhận Hàng</label>

                               
                            </div> 
                           <div class="panel-default">
                                <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" />
                                <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Thanh Toán Bằng Ngân Hàng <img src="fontEnd/img/icon/papyel.png" alt=""></label>

                                <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                       <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p> 
                                    </div>
                                </div>
                            </div>
                            <div class="order_button">
                                <button  type="submit">Thanh Toán</button> 
                            </div>    
                        </div> 
                    </form>         
                </div>
            </div> 
        </div> 
    </div>       
</div>
<!--Checkout page section end-->


@endsection
