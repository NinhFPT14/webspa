@extends('backend.layouts.master')
@section('title')
Danh sách cấu hình sms
@endsection
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addSms')}}" class="btn btn-primary" role="button">Tạo Mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Mã API</th>
                            <th scope="col">Mã thiết bị</th>
                            <th scope="col">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->code_api}}</td>
                            <td>{{$data->code_devices}}</td>
                            <td>
                                <a href="{{route('editSms',['id'=>$data->id])}}"
                                    class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection