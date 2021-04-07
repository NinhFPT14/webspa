@extends("backend.layouts.master")
@section("title")
Danh sách đơn đặt lịch
@endsection
@section('content')
@section("link")
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
@endsection
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Danh sách đơn đặt lịch</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Mã đơn</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Ngày hẹn</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chi tiết</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                        <tr>
                            <td scope="col">#{{ $value->id }}</td>
                            <td>{{$value->name}}</td>
                            <td scope="col">0{{chunk_split($value->phone, 3, ' ')}}</td>
                            <td scope="col">{{$value->time_ficked}}</td>
                            <td scope="col">{{date('Y-m-d', strtotime($value->time_start))}}</td>
                            <td>
                                @if($value->status == 0)
                                <p class="text-warning">Chờ xếp lịch</p>
                                @else
                                <p class="text-success">Đã xếp lịch</p>
                                @endif
                            </td>
                            <td>
                                <a href="" class="btn btn-primary" target="_blank">Xem</a>
                            </td>
                            <td><button type="button" class="btn btn-success btn-xep-lich" data-orderid="{{$value->id}}" >Xếp lịch</button>
                                <a href="{{route('deleteService',['id'=>$value->id])}}" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$data->links()!!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-green-500 ">
                <h4 class="modal-title  text-2xl" id="exampleModalLabel">Xếp lịch hẹn</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="grid grid-cols-2 gap-4 pl-4">
                    <div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Họ Tên<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="modal_name" aria-label="First name">
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Số điện thoại<span class="text-danger"> *</span></label>
                                <input type="number" class="form-control" aria-label="">
                            </div>
                        </div>
                        <div class="col-md-32 pl-4">
                            <label>Dịch Vụ<span class="text-danger"> *</span></label> <br>
                            <select class="mul-select form-control" id="modal_service" style="width: 532px;" multiple>
                                <optgroup label="Chọn dịch vụ/"></optgroup>
                                @foreach($services as $sv)
                                <option value="{{$sv->id}}">{{$sv->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Thời gian<span class="text-danger"> *</span></label>
                                <select class="form-control">
                                    <option value="Cambodia">sáng</option>
                                    <option value="Khmer">chiều</option>
                                    <option value="Thiland">tối</option>

                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Thời gian hẹn<span class="text-danger"> *</span></label>
                                <input type="date" class="form-control" placeholder="Mời nhâp nhân viên thực hiện..."
                                    aria-label="First name">
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Lời nhắn</label>
                                <textarea name="" id="" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Phương thức thanh toán<span class="text-danger"> *</span></label>
                                <select name="" id="" class="form-control">
                                    <option value="">Tiền mặt</option>
                                    <option value="">Chuyển khoản ngân hàng</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Trạng thái<span class="text-danger"> *</span></label>
                                <select name="" id="" class="form-control">
                                    <option value="">đang chờ</option>
                                    <option value="">đã xác nhận</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="pr-5">
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Thời gian:<span class="text-danger"> *</span></label>

                                <select class="mul-select form-control" style="width: 515px;" multiple>
                                    <optgroup label="Chọn dịch vụ/"></optgroup>
                                    <option value="Cambodia">sáng</option>
                                    <option value="Khmer">chiều</option>
                                    <option value="Thiland">tối</option>

                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Trạng thái thanh toán <span class="text-danger"> *</span></label>
                                <select name="" id="" class="form-control">
                                    <option value="">Chưa thanh toán</option>
                                    <option value="">Thanh toán theo đợt</option>
                                    <option value="">Đã thanh toán</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Ghi chú</label>
                                <textarea name="" id=""class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Ghế làm <span class="text-danger"> *</span></label>
                                <select name="" id="" class="form-control">
                                <option value="">Chọn ghế làm</option>
                                    <option value="">Ghế 1</option>
                                    <option value="">Ghế 2</option>
                                    <option value="">Ghế 3</option>
                                    <option value="">Ghế 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pt-4 pl-7 pr-4">
                    <form action="" class="insert-form" id="insert_form" method="POST">
                        <div class="input-field">
                            <table class="table table-bordered" id="table-field">
                                <tr>
                                    <th>Dịch vụ</th>
                                    <th>Ghi Chú</th>

                                    <th><input type="button" class="btn btn-warning" name="add" id="add"
                                            value="Thêm Khách hàng" required></th>
                                </tr>

                            </table>
                        </div>
                    </form>
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </div>
</div>


@endsection
@section("js")
<script>
$(document).ready(function() {
    // $(".mul-select").select2();

    var html =
        '<tr> <td><input class="form-control" type="text" name="service" required></td><td><textarea name="service" class="form-control" id="" ></textarea></td><td><input type="button" class="btn btn-danger" name="remove" id="remove" value="Hủy" required></td></tr>';
    var x = 1;
    $("#add").click(function() {
        $("#table-field").append(html);
    });
    $("#table-field").on('click', '#remove', function() {
        $(this).closest('tr').remove();
    })

    $('.btn-xep-lich').on('click', function(){
        let appointmentId = $(this).data('orderid');
        let apiGetAppointmentById = '{{route("appointment.getDataById")}}';
        $.ajax({
            url: apiGetAppointmentById,
            method: "POST",
            data: {
                id: appointmentId,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response){
                let appointmentData = response.data;
                console.log(appointmentData);
                $('#modal_name').val(appointmentData.name);
                let modalOption = $('#modal_service').find('option');
                // console.log(modalOption)
                for(let i = 0; i < modalOption.length; i++){
                    let index = appointmentData.services.findIndex(el => el.id == $(modalOption[i]).val());
                    if(index != -1){
                        $(modalOption[i]).prop('selected', true);
                    }else{
                        $(modalOption[i]).prop('selected', false);
                    }
                }

                $('#appointmentModal').modal('show');
                $(".mul-select").select2();
            }
        })
    })
});
</script>


@endsection