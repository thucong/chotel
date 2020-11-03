@extends('templates.admin.master')
@section('main-content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Sửa tiện ích</h2>
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
                                    <form role="form" method="post" action="{{route('admin.utility.edit',$utility->uid)}}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên tiện ích</label>
                                            <input type="text" name="ten" class="form-control" value="{{$utility->uname}}" />
                                        </div>

                                       
                                        <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
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
