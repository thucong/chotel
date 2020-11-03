@extends('templates.chotel.master1')
@section('main-content')


    @foreach($item as $room)
    @php
        $rid = $room->rid;
        $uid = $room->uid;
        $rname = $room->rname;
        $tname = $room->tname;
        $util = $room->uname;
        $typeId = $room->type_id;
        $description = Str::limit($room->description,160);
        $slug = Str::slug($rname);
        $urlDetail = route('chotel.room.detail', ['slug' => $slug, 'id' => $rid,'typeId'=>$typeId]);
    @endphp
    <div>
        <script type="text/javascript">
    function remove_background(rid){
        for(var count = 1; count <= 5;count++){
            $('#'+rid+'-'+count).css('color','#ccc');
        }
    }
    //hover chuột đánh giá sao
    $(document).on('mouseenter','.rating',function(){
        var index = $(this).data("index");
        var rid = $(this).data("rid");
        remove_background(rid);
        for(var count=1;count<=index;count++){
            $('#'+rid+'-'+count).css('color','#ffcc00');
        }
    });
    //nhả chuột không đánh giá
    $(document).on('mouseleave','.rating',function(){
        var index = ($this).data("index");
        var rid = $(this).data("rid");
        var rating = $(this).data("rating");
        remove_background(rid);
        for(var count=1;count<=index;count++){
            $('#'+rid+'-'+count).css('color','#ffcc00');
        }
    });
    //click đánh giá sao
    $(document).on('click','.rating',function(){
        var index = ($this).data("index");
        var rid = $(this).data("rid");
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('insert_rating')}}",
            method:"POST",
            data:{index:index,rid:rid,_token:_token},
            success:function(data){
                if(data == "done"){
                    alert("Bạn đã đánh giá"+index+" trên 5");
                }else{
                    alert("Lỗi đánh giá");
                }
            }
        });
    });
</script>
    <h3>{{$rname}}</h3>

        <div class="vnecontent">
            <img src="/chotel1/storage/app/files/{{$room->picture}}" alt="" width="95%" />
            <p>Loại phòng: <a href="" title="">{{$tname}}</a> Tiện ích: {{$util}}</p>
            {{$description}}

        </div>
        <div class="raroom">
            <p>Phòng liên quan</p>
            <ul>
                @foreach($sameType as $type)
                 @php
                    $rid = $type->rid;
                    $uid = $type->uid;
                    $typeId = $type->type_id;
                    $rname = $type->rname;
                    $tname = $type->tname;
                    $util = $type->uname;
                    $description = Str::limit($type->description,160);
                    $urlPic = '/chotel1/storage/app/public/files/'.$type->picture;
                    $slug = Str::slug($rname);
                    $urlDetail = route('chotel.room.detail', ['slug' => $slug, 'id' => $rid,'typeId'=>$typeId]);
                @endphp

                    <li>
                    <a href="{{ $urlDetail }}" title="">{{$rname}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class= "rating">
            <p><b>Viết đánh giá của bạn</b></p>
            <ul>
                @for($count = 1; $count<=5;$count++)
                    @php
                        if($count<=$rating){
                            $color ='color:#ffcc00;';
                        }else{
                            $color ='color:#ccc;';
                        }
                    @endphp
                <li class="rating" title="đánh giá sao"
                id="{{$rid}}-{{$count}}" 
                data-index="{{$count}}"
                data-rid="{{$rid}}"
                data-rating="{{$rating}}"
                style="cursor:pointer;{{$color}}font-size:30px;display: inline">
                    &#9733;
                </li>
                @endfor
            </ul>
        </div>
        <div class="comment Form">
            <h3>Bình luận</h3>
            <form method="get" action="">
                @csrf
                <p><input type="text" name="email" placeholder="Email*" ></p>
                <p><input type="text" name="username" placeholder="Username*" ></p>
                <p><textarea rows="5" placeholder="Nội dung*"></textarea></p>
                <p><input type="submit" name="submit" value="Bình luận"></p>
            </form>
        </div>
        <div class="comment">
            <img src="/chotel1/storage/app/files/avatar.jpg" height="40px" width="40px">
            <h4>lkjh</h4>
            <p>sdf</p>
            <p>dg</p>
        </div>
    </div>
    @endforeach
@endsection
