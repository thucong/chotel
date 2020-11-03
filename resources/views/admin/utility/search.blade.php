@extends('templates.admin.master')
@section('main-content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Danh sách tiện ích</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
             @php
                function doimau($str,$tukhoa){
                    return str_replace($tukhoa,"<span style='color: red'>$tukhoa</span>",$str);
                }
            @endphp
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                               
                                </div>
                                <p align="left"> Kết quả tìm kiếm {{$tukhoa}}</p>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                             <th width="160px">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach ($search as $utility)
								                @php
								                $uid = $utility->uid;
								                $uname = $utility->uname;
								                @endphp
                                        <tr class="gradeX">
                                             
                                            <td>{{$uid}}</td>
                                            <td>{!! doimau($uname,$tukhoa)!!}</td>
                                            
                                            <td class="center">
                                                <a href="{{route('admin.utility.edit',$utility->uid)}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i>
                                                    Sửa</a>
                                                <a href="{{route('admin.utility.delete',$utility->uid)}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i>
                                                    Xóa</a>
                                            </td>
                                            </tr>
                                            @endforeach
                                            
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">
                                            Hiển thị các tiện ích</div>
                                    </div>
                                    <div class="col-sm-6" style="text-align: right;">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="dataTables-example_paginate">
                                            <ul class="pagination">
                                             
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>

    </div>
@endsection
