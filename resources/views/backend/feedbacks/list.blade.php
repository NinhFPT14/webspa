@extends('backend.layouts.master')
@section('title')
  Danh Sách Feedback
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Phản hồi</li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{route('listFeedback')}}">Danh sách phản hồi</a></li>
        </ol>
      </nav>
    <div class="card shadow mb-4">
        <div class="card-body">
          <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
            @csrf
            <div class="input-group">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm ..." name="key" value="{{$key}}">
                </div>
                <div class="input-group input-daterange">
                    <input type="text" class="form-control" name="from_time" autocomplete="off" value="{{$from_time}}">
                    <div class="input-group-addon">đến</div>
                    <input type="text" class="form-control" name="to_time" autocomplete="off" value="{{$to_time}}">
                </div>
                <div class="form-group">
                    <select  name="type" class="form-control">
                        <option selected disabled>Chọn trạng thái</option>
                        <option value="0" {{$type == 0 ? 'selected':''}} >Chưa xem</option>
                        <option value="1" {{$type == 1 ? 'selected':''}}>Đã xem</option>
                    </select>
                </div>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Số điện thoại </th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chi tiết</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <th scope="row">{{$item->id}}</th>
                          <th scope="row">{{$item->name}}</th>
                          <th scope="row">{{$item->phone_number}}</th>
                          <th scope="row">{{$item->created_at}}</th>
                          <th scope="row">
                              @if($item->status == 0)
                              <p class=" text-danger">Chưa xem</p>
                              @else
                              <p class=" text-success">Đã xem</p>
                              @endif
                            </th>

                            <td><button type="button" class="btn btn-primary chi-tiet" data-orderid="{{$item->id}}" data-toggle="modal" data-target="#exampleModal">
                              Xem
                            </button>
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
@endsection

@section("js")
<script src="momentjs/moment.min.js"></script>
<script>
$(document).ready(function() {
  $('.input-daterange input').each(function() {
        $(this).datepicker({
            clearDates: true,
            format: "dd/mm/yyyy"
        });
    });
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
});
</script>


@endsection