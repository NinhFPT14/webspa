@extends("backend.layouts.master")
@section("title")
Bảng xếp lịch
@endsection
@section('content')
@section("link")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
@endsection
<div class="p-4">
    <div class=" d-flex align-items-center">
        <div class="col-md-2">
            <input type="text" class="form-control" placeholder="Tên KH, SĐT, Mã lịch hẹn" aria-label="First name">
        </div>
        <div class="col-md-2">
            <input type="date" class="form-control" placeholder="" aria-label="First name">
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 pt-2 ">
        <div class="col-span-3">
            <table class="table table-bordered m-0">
                <thead>
                    <tr class="text-center bg-blue-300">
                        <th>Khung giờ</th>
                        <th>Ghế 2</th>
                        <th>Ghế 3</th>
                        <th>Ghế 4</th>
                        <th>Ghế 5</th>
                        <th>Ghế 6</th>
                        <th>Ghế 7</th>
                        <th>Ghế 8</th>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">8:00-9:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Ninh
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        </td>

                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">9:00-10:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">10:00-11:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">11:00-12:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">12:00-13:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">13:00-14:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">14:00-15:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">15:00-16:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>
                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">16:00-17:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>
                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">17:00-18:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>
                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">18:00-19:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>
                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">19:00-20:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>
                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">20:00-21:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>
                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">21:00-22:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>

                            </div>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                            ng-click="showAddModal($event,t,x.IdStr,time)" title="Click để tạo mới"
                            class="ng-scope today h-100" role="button" role="button" tabindex="0">
                            <div class="dropdown spa-dropdown dropright ng-hide"
                                ng-show="getInfoByTime(t,time.start, time.end,2).length>0" style="font-size:14px;"
                                aria-hidden="true">
                                <a type="button" class="w-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    .
                                </a>
                            </div>
                        </td>
                        </td>
                    </tr>
                </thead>

            </table>
        </div>

        <div>
<<<<<<< HEAD
            <input type="date" class="form-control" placeholder="" aria-label="First name">
=======
            <form action="{{route('searchTimeAppointment')}}" method="POST">
                @csrf
                <div class="flex">
                    <input type="date" name="time" class="form-control" value="{{$time}}" placeholder=""
                        aria-label="First name">
                    <button type="submit" class="form-control btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
>>>>>>> 83d7db279a5cfeecda5331e4c9f0a136abdaec02
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">SĐT</th>
<<<<<<< HEAD
                        <th scope="col">Thời gian</th>
=======
>>>>>>> 83d7db279a5cfeecda5331e4c9f0a136abdaec02
                        <th scope="col">Xác nhận</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointment as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->phone}}</td>
<<<<<<< HEAD
                        <td>{{$value->time_ficked}}</td>
                        <td><button type="button" class="btn btn-success btn-xep-lich" data-orderid="{{$value->id}}"><i
=======
                        <td><button type="button" class="btn btn-success btn-xep-lich " data-orderid="{{$value->id}}"><i
>>>>>>> 83d7db279a5cfeecda5331e4c9f0a136abdaec02
                                    class="fas fa-fw fa-edit"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <ul class="pagination pagination-sm m-t-none m-b-none">
                    {!!$appointment->links()!!}
                </ul>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-green-500 ">
                    <h4 class="modal-title  text-2xl" id="exampleModalLabel">Xếp lịch</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="grid grid-cols-2 gap-4 pl-4">
                        <div>
                            <div class="col-md-32 pl-4">
                                <label>Chọn khách hàng </label> <br>
                                <input type="text" class="form-control" name="id" placeholder="Mời nhâp mã đơn...">
                            </div>
                            <div class="col-md-32 pl-4">
                                <label>Chọn Dịch Vụ</label> <br>
                                <select class=" form-control">
                                    <optgroup label="Chọn dịch vụ/"></optgroup>
                                    @foreach($services as $sv)
                                    <option value="{{$sv->id}}">{{$sv->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Thời gian làm</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Thời gian bắt đầu</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Thời gian kết thúc</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Trạng thái</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">đã xác nhận</option>
                                        <option value="">đang chờ</option>
                                        <option value="">đã hoàn thành</option>
                                        <option value="">đang thực hiện</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-success">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Xác nhận đơn  -->
<div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-green-500 ">
                <h4 class="modal-title  text-2xl" id="exampleModalLabel">Thông tin đặt lịch</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="grid grid-cols-2 gap-4 pl-4">
                    <div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Họ Tên<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="name" id="modal_name" aria-label="First name">
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Số điện thoại<span class="text-danger"> *</span></label>
                                <input type="number" name="phone" id="modal_phone" class="form-control" aria-label="">
                            </div>
                        </div>
                        <div class="col-md-32 pl-4">
                            <label>Dịch Vụ<span class="text-danger"> *</span></label> <br>
                            <select class="mul-select form-control" name="service_id" id="modal_service" style="width: 532px;" multiple>
                                <optgroup label="Chọn dịch vụ/"></optgroup>
                                @foreach($services as $sv)
                                <option value="{{$sv->id}}">{{$sv->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Thời gian<span class="text-danger"> *</span></label>
                                <select class="form-control"  id="time_ficked" name="time_ficked">
                                    <option value="Sáng">sáng</option>
                                    <option value="Chiều">chiều</option>
                                    <option value="Tối">tối</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Ngày hẹn<span class="text-danger"> *</span></label>
                                <input type="date" class="form-control" name="time_start" id="modal_time"
                                    aria-label="First name">
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Lời nhắn</label>
                                <textarea name="note" id="modal_note" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Phương thức thanh toán<span class="text-danger"> *</span></label>
                                <select name="payment_methods" id="payment_methods" class="form-control">
                                    <option value="0">Tiền mặt</option>
                                    <option value="1">Chuyển khoản ngân hàng</option>
                                </select>
                            </div>
                        </div>

                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Trạng thái đơn<span class="text-danger"> *</span></label>
                                <select name="status" id="modal_status" class="form-control">
                                    <option value="1">Đã xác nhận</option>
                                    <option value="2">Đã lên lịch</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="pr-5">
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Gọi điện xác nhận<span class="text-danger"> *</span></label>
                                <select name="call_confirmation" id="call_confirmation" class="form-control">
                                <option value="" selected>Chọn trạng thái</option>
                                    <option value="0">Không gọi được</option>
                                    <option value="1">Đã gọi</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Trạng thái thanh toán <span class="text-danger"> *</span></label>
                                <select name="payment_status" id="payment_status" class="form-control">
                                <option value="" selected>Chọn trạng thái</option>
                                    <option value="0">Chưa thanh toán</option>
                                    <option value="1">Đã thanh toán</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Ghi chú</label>
                                <textarea name="note_admin" id="note_admin" class="form-control"></textarea>
                            </div>
                        </div>
                        <p id="thong_bao" class="text-success"></p>
                    </div>
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-success btn-xac-nhan">Lưu</button>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD


<!-- Xác nhận đơn  -->
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

=======
@endsection
>>>>>>> 83d7db279a5cfeecda5331e4c9f0a136abdaec02
@section("js")
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<script>
$(document).ready(function() {
<<<<<<< HEAD
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
=======
    $(".mul-select").select2();
    $('.btn-xep-lich').on('click', function() {
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
            success: function(response) {
                let appointmentData = response.data;
                $('.btn-xac-nhan').val(appointmentData.id);
                $('#modal_name').val(appointmentData.name);
                $('#modal_phone').val(appointmentData.phone);
                $('#modal_note').val(appointmentData.note);
                $('#modal_time').val(new Date(appointmentData.time_start).toISOString().split('T')[0]);
                let modalOption = $('#modal_service').find('option');
                for (let i = 0; i < modalOption.length; i++) {
                    let index = appointmentData.services.findIndex(el => el.id == $(
                        modalOption[i]).val());
                    if (index != -1) {
                        $(modalOption[i]).prop('selected', true);
                    } else {
                        $(modalOption[i]).prop('selected', false);
                    }
                }
                let timeFicked = $('#time_ficked').find('option');
                for (let i = 0; i < timeFicked.length; i++) {
                    if (appointmentData.time_ficked == $(timeFicked[i]).val()) {
                        $(timeFicked[i]).prop('selected', true);
                    } else {
                        $(timeFicked[i]).prop('selected', false);
                    }
                }

                let paymentMethods = $('#payment_methods').find('option');
                for (let i = 0; i < paymentMethods.length; i++) {
                    if (appointmentData.payment_methods == $(paymentMethods[i]).val()) {
                        $(paymentMethods[i]).prop('selected', true);
                    } else {
                        $(paymentMethods[i]).prop('selected', false);
                    }
                }

                let status = $('#modal_status').find('option');
                for (let i = 0; i < status.length; i++) {
                    if (appointmentData.status == $(status[i]).val()) {
                        $(status[i]).prop('selected', true);
                    } else {
                        $(status[i]).prop('selected', false);
                    }
                }

                let call_confirmation = $('#call_confirmation').find('option');
                for (let i = 0; i < status.length; i++) {
                    if (appointmentData.call_confirmation == $(call_confirmation[i]).val()) {
                        $(call_confirmation[i]).prop('selected', true);
                    } else {
                        $(call_confirmation[i]).prop('selected', false);
                    }
                }

                let payment_status = $('#payment_status').find('option');
                for (let i = 0; i < status.length; i++) {
                    if (appointmentData.payment_status == $(payment_status[i]).val()) {
                        $(payment_status[i]).prop('selected', true);
                    } else {
                        $(payment_status[i]).prop('selected', false);
                    }
                }
                
                $('#note_admin').val(appointmentData.note_admin);

                $('#appointmentModal').modal('show');
                $(".mul-select").select2();
            }
        })
    })


    $('.btn-xac-nhan').on('click', function() {
        let appointmentId = $(".btn-xac-nhan").val();
        let name = $("#modal_name").val();
        let phone = $("#modal_phone").val();
        let note = $("#modal_note").val();
        let service_id = $("#modal_service").val();
        let time_ficked = $("#time_ficked").val();
        let time_start = $("#modal_time").val();
        let status = $("#modal_status").val();
        let payment_methods = $("#payment_methods").val();
        let call_confirmation = $("#call_confirmation").val();
        let payment_status = $("#payment_status").val();
        let note_admin = $("#note_admin").val();
        let apiGetAppointmentById = '{{route("confirmAppointment")}}';
>>>>>>> 83d7db279a5cfeecda5331e4c9f0a136abdaec02
        $.ajax({
            url: apiGetAppointmentById,
            method: "POST",
            data: {
                id: appointmentId,
<<<<<<< HEAD
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
=======
                name: name,
                phone: phone,
                note: note,
                time_ficked: time_ficked,
                time_start: time_start,
                status: status,
                payment_methods: payment_methods,
                call_confirmation: call_confirmation,
                payment_status: payment_status,
                note_admin: note_admin,
                service_id: service_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                swal("Thành công", "xác nhận thành công ấn ok để tiếp tục !", "success");
>>>>>>> 83d7db279a5cfeecda5331e4c9f0a136abdaec02
            }
        })
    })
});
</script>


@endsection