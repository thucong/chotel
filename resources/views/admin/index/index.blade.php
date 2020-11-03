@extends('templates.admin.master')
@section('main-content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>TRANG QUẢN TRỊ VIÊN</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-green set-icon">
                            <i class="fa fa-bars"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text"><a href="{{ route('admin.roomType.index')}}" title="">Quản lý loại phòng</a></p>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-bell-o"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text"><a href="{{ route('admin.room.index')}}" title="">Quản lý phòng</a></p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-brown set-icon">
                            <i class="fa fa-rocket"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text"><a href="{{ route('admin.user.index')}}" title="">Quản lý người dùng</a></p>
                           
                        </div>
                    </div>
                </div>
                 <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-brown set-icon">
                            <i class="fa fa-rocket"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text"><a href="{{ route('admin.utility.index')}}" title="">Quản lý tiện ích</a></p>
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
