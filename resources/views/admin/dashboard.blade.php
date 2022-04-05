@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Dashboard - logs</span>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="container">
                <ul class="notification">
                    @foreach($logs as $log)
                        <li>
                            <div class="notification-time">
                                <span class="date">{{getDatedmy($log->created_at)}}</span>
                                <span class="time">{{getTimehis($log->created_at)}}</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-img-user avatar-md main-avatar online me-3 shadow">
                                        <a class="" href=""><img alt="avatar" class="rounded-circle" src="{{asset('admin/img/faces/6.jpg')}}"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-0">
                                                <h5 class="mb-1 tx-15 font-weight-semibold text-dark">{{$log->getAdmin['name']}}</h5>
                                                <p class="mb-0 tx-13 mb-0 text-muted">{{$log->content}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
            <!-- row closed -->


        </div>
        <!-- Container closed -->
    </div>
@endsection
