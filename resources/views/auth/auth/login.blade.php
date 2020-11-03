@extends('templates.admin.master')
@section('main-content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Đăng nhập</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @if(Session::has('msg'))
                                    <p>{{Session::get('msg')}}</p>
                                    @endif
                                    <form role="form" method="post" action="{{route('auth.auth.login')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="password" class="form-control" />
                                        </div>
                                        
                                       
                                        <button type="submit" name="submit" class="btn btn-success btn-md">Đăng nhập</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Elements -->
                </div>
            </div>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
@endsection
