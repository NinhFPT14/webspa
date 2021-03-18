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
            <p class="h-10 w-72 bg-red-300 rounded-md text-center pt-2">Hôm nay có 0 lịch hẹn</p>
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
@section("js")
<script>
$(document).ready(function() {
    $(".mul-select").select2();
})
</script>
<script type="text/javascript">
$(document).ready(function() {
    var html =
        '<tr> <td><input class="form-control" type="text" name="service" required></td><td><textarea name="service" class="form-control" id="" ></textarea></td><td><input type="button" class="btn btn-danger" name="remove" id="remove" value="Hủy" required></td></tr>';
    var x = 1;
    $("#add").click(function() {
        $("#table-field").append(html);
    });
    $("#table-field").on('click', '#remove', function() {
        $(this).closest('tr').remove();
    })

});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
    integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
    integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
</script>
@endsection
@endsection