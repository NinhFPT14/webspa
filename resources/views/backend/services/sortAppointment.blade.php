@extends("backend.layouts.master")
@section("title")
Bảng xếp lịch
@endsection
@section('content')
@section("link")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


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
            <input type="date" class="form-control" placeholder="" aria-label="First name">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Xác nhận</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointment as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->time_ficked}}</td>
                        <td><button type="button" class="btn btn-success btn-xep-lich" data-orderid="{{$value->id}}"><i
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
                    <h4 class="modal-title  text-2xl" id="exampleModalLabel">Tạo mới lịch hẹn</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="grid grid-cols-2 gap-4 pl-4">
                        <div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Họ Tên<span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Mời nhập họ tên..."
                                        aria-label="First name">
                                </div>
                            </div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Số điện thoại<span>*</span></label>
                                    <input type="number" class="form-control" placeholder="Mời nhập số điện thoại..."
                                        aria-label="">
                                </div>
                            </div>
                            <div class="col-md-32 pl-4">
                                <label>Chọn Dịch Vụ*</label> <br>
                                <select class="mul-select form-control" style="width: 532px;" multiple>
                                    <optgroup label="Chọn dịch vụ/"></optgroup>
                                    <option value="Cambodia">tu dep trai</option>
                                    <option value="Khmer">thi xinh gai</option>
                                    <option value="Thiland">vinh lon</option>
                                    <option value="Koren">cong nhieu tien</option>
                                    <option value="China">ninh hot boy</option>
                                </select>
                            </div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Thời gian hẹn<span>*</span></label>
                                    <input type="date" class="form-control"
                                        placeholder="Mời nhâp nhân viên thực hiện..." aria-label="First name">
                                </div>
                            </div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>ND hẹn<span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Mời nhâp nội dung..."
                                        aria-label="First name">
                                </div>
                            </div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Trạng thái<span>*</span></label>
                                    <select name="" id="" class="form-control">
                                        <option value="">đã xác nhận</option>
                                        <option value="">đang chờ</option>
                                        <option value="">đã hoàn thành</option>
                                        <option value="">đang thực hiện</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="pr-5">
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Địa chỉ:<span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Mời nhập địa chỉ..."
                                        aria-label="First name">
                                </div>
                            </div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Thời gian:<span>*</span></label>

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
                                    <label>Nội Dung Hẹn<span>*</span></label>
                                    <textarea name="" id="" placeholder="mời nhập nội dung hẹn"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Ghi chú<span>*</span></label>
                                    <textarea name="" id="" placeholder="mời nhập nội dung ghi chú..."
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row pl-4 pt-2">
                                <div class="col">
                                    <label>Số Lượng khách:<span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Mời nhập số lượng khách..." />
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
</div>


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