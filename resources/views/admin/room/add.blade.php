@extends('templates.admin.master')
@section('main-content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Thêm phòng</h2>
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
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form role="form" method="post" action="{{route('admin.room.add')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên phòng</label>
                                            <input type="text" name="ten" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea class="form-control ckeditor" id="editor1" rows="5" name="mota"></textarea>
                                            <script type="text/javascript">

                                              CKEDITOR.replace( 'editor1',

                                              {

                                                filebrowserBrowseUrl: '/{{$adminUrl}}/ckfinder/ckfinder.html',

                                                filebrowserImageBrowseUrl: '/{{$adminUrl}}/ckfinder/ckfinder.html?type=Images',

                                                filebrowserUploadUrl: '/{{$adminUrl}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                                                filebrowserImageUploadUrl: '/{{$adminUrl}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'

                                              });

                                            </script>
                                        </div>
            
                                       
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" name="hinhanh" />
                                        </div>
                                        <div class="form-group">
                                            <label>Loại phòng</label>
                                            <select class="form-control" name="loaiphong">
                                            	@foreach($room_type as $item)
                                                <option value="{{$item->type_id}}">{{$item->tname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tiện ích</label>
                                            <select class="form-control" name="tienich">
                                               @foreach($utility as $item)
                                                <option value="{{$item->uid}}">{{$item->uname}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
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
