@extends('backend.layouts.master')
@section('title')
  Danh Sách Feedback
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Feedback</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách Feedback</li>
        </ol>
      </nav>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại </th>
                            <th scope="col">Lời Nhắn </th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <th scope="row">{{$item->id}}</th>
                          <th scope="row">{{$item->name}}</th>
                          <th scope="row">{{$item->email}}</th>
                          <th scope="row">{{$item->phone_number}}</th>
                          <th scope="row">{{$item->content}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

