<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <?php
              $feedback = DB::table('feedbacks')->where('status',0)->get();
            ?>
            <span class="badge badge-danger badge-counter">{{count($feedback)}}</span>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
                Thông báo phản hồi
            </h6>
            @foreach ($feedback as $item)
            <a class="dropdown-item d-flex align-items-center chi-tiet" data-orderid="{{$item->id}}" data-toggle="modal" data-target="#exampleModal">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="backEnd/img/undraw_profile_1.svg"
                        alt="">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                    <div class="text-truncate">{{$item->name}}</div>
                    <div class="small text-gray-500">{{$item->created_at}}</div>
                </div>
            </a>
            @endforeach
            <a class="dropdown-item text-center small text-gray-500" href="{{route('listFeedback')}}">Xem thêm phản hồi</a>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
            <img class="img-profile rounded-circle"
                src="backEnd/img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
            <a class="dropdown-item modal_otp" data-userid ="{{Auth::user()->id}}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Đổi mật khẩu
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Đăng xuất
            </a>
        </div>
    </li>

</ul>

</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắc muốn đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sau khi đăng xuất bạn sẽ quay về trang chủ và không có quyền truy cập admin.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Từ chối</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Đồng ý</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Chi tiết phản hồi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
      
              <div class="form-group flex">
                <label for="exampleInputEmail1">Họ tên :</label>
                <input type="text" readonly="readonly" class="form-control" id="modalName" >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="text" readonly="readonly" class="form-control" id="modalPhone" >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Thời gian</label>
                <input type="text" readonly="readonly" class="form-control" id="modalCreated" >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nội dung</label>
                <textarea class="form-control" readonly="readonly" id="modalContent" cols="30" rows="10"></textarea>
              </div>
      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>    

<!-- Modal otp -->
<div class="modal fade" id="modalOtp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h5 class="modal-title" id="staticBackdropLabel">XÁC THỰC OTP ĐỔI MẬT KHẨU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="exampleInputPassword1">Nhập mã otp</label>
            <input type="text" class="form-control" id="code_otp" >
            <p id="thong_bao_otp" class="text-danger"></p>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success btn-gui-otp" name="" data-userid ="{{Auth::user()->id}}">Gửi</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal đổi mật khẩu -->
<div class="modal fade" id="modalPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h5 class="modal-title" id="staticBackdropLabel">ĐỔI MẬT KHẨU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu mới</label>
            <input type="password" class="form-control" id="password" >
            <p id="thong_bao_mk" class="text-danger"></p>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Nhập lại</label>
            <input type="password" class="form-control" id="password_confirm" >
            <p id="thong_bao_mk2" class="text-danger"></p>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success btn-doi-mat-khau" name="" data-userid ="{{Auth::user()->id}}">Gửi</button>
      </div>
    </div>
  </div>
</div>
@section("js")
<script src="momentjs/moment.min.js"></script>
<script>
$(document).ready(function() {
    $('.chi-tiet').on('click', function() {
        let id = $(this).data('orderid');
        console.log(id);
        let apiGetAppointmentById = '{{route("feedback.detail")}}';
        $.ajax({
            url: apiGetAppointmentById,
            method: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                let appointmentData = response.data;
                $('#modalName').val(appointmentData.name);
                $('#modalPhone').val(appointmentData.phone_number);
                $('#modalCreated').val(moment(new Date(appointmentData.created_at)).format('DD-MM-YYYY HH:MM:SS'));
                $('#modalContent').val(appointmentData.content);
            }
        })
    })


    $('.modal_otp').on('click', function() {
        $("p#thong_bao_otp" ).html(' ');
        $("p#thong_bao_mk" ).html(' ');
        $("p#thong_bao_mk2" ).html(' ');
        $('#modalOtp').modal('show');
        let id = $(this).data('userid');
        let apiOtp = '{{route("login.otp")}}';
        $.ajax({
            url: apiOtp,
            method: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
            }
        })
    })

    $('.btn-gui-otp').on('click', function() {
        let code = $("#code_otp").val();
        let id = $(this).data('userid');
        let apiConfirmOtp = '{{route("login.confirm.otp")}}';
        $.ajax({
            url: apiConfirmOtp,
            method: "POST",
            data: {
                id: id,
                code:code,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                if(response.data){
                    $('#modalOtp').modal('hide');
                    $("#code_otp").val( ' ');
                    $('#modalPassword').modal('show');
                }else if(response.messages){
                    $("p#thong_bao_otp" ).html('- ' + response.messages.code);
                }
                else{
                    $("p#thong_bao_otp" ).html('- ' + response.fail);
                }
            }
        })
    })

    $('.btn-doi-mat-khau').on('click', function() {
        let password = $("#password").val();
        let password_confirm = $("#password_confirm").val();
        let id = $(this).data('userid');
        let apiConfirmOtp = '{{route("login.password")}}';
        $.ajax({
            url: apiConfirmOtp,
            method: "POST",
            data: {
                id: id,
                password:password,
                password_confirm:password_confirm,
                _token: '{{csrf_token()}}',
            },
            dataType: 'json',
            success: function(response) {
                if(response.data){
                    $('#modalPassword').modal('hide')
                    swal({
                        title: "Thành công!",
                        text: "Đổi mật khẩu thành công",
                        icon: "success",
                        button: "OK",
                        });
                }else if(response.messages.password){
                    $("p#thong_bao_mk" ).html('- ' + response.messages.password);
                }
                else{
                    $("p#thong_bao_mk2" ).html('- ' + response.messages.password_confirm);
                }
            }
        })
    })
});
</script>


@endsection