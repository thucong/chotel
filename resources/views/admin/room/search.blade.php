@extends('templates.admin.master')
@section('main-content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Danh sách phòng</h2>
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
                                
                            	<p align="left"> Kết quả tìm kiếm {{$tukhoa}}</p>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Phòng</th>
                                            <th>Mô tả</th>
                                            <th>Created_at</th>
                                            <th>Updated_at</th>
                                            <th>Hình ảnh</th>
                                            <th>Tiện ích</th>
                                            <th>Loại phòng</th>
                                            <th width="160px">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach ($search as $item)
								                @php
								                $rid = $item->rid;
								                $rname = $item->rname;
								                $description = Str::limit($item->description,160);
								        		$created = $item->created_at;
								        		$update = $item->updated_at;
								                $utility = $item->uname;
                                                $type = $item->tname;
								                @endphp
                                        <tr class="gradeX">
                                             
                                            <td>{{$rid}}</td>
                                            <td>{!! doimau($rname,$tukhoa)!!}</td>
                                            <td>{{$description}}</td>
                                            <td>{{$created}}</td>

                                            <td class="center">{{$update}}</td>
           
                                            <td class="center">
                                            <img src="/chotel1/storage/app/files/{{$item->picture}}" alt="" height="80px" width="100px" />
                                            </td>
                                             <td>{{$utility}}</td>
                                              <td>{{$type}}</td>
                                            <td class="center">
                                                <a href="{{route('admin.room.edit',$rid)}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i>
                                                    Sửa</a>
                                                <a href="{{route('admin.room.delete',$rid)}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i>
                                                    Xóa</a>
                                            </td>
                                            </tr>
                                            @endforeach
                                            
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">
                                            Hiển thị các phòng</div>
                                    </div>
                                    <div class="col-sm-6" style="text-align: right;">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="dataTables-example_paginate">
                                            <ul class="pagination">

                                               {{$search->links()}}
                                                
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
