@extends('templates.chotel.master')

@section('main-content')
    <div class="blog">
        <div class="vnelist">
            
            <ul>
                @foreach($room_type as $type)
                @php
                    $tname = $type->tname;
                    $slug = Str::slug($tname);
                @endphp
                <li><a href="{{ route('chotel.room.list', ['slug' => $slug, 'id' => $type->type_id]) }}">{{$type->tname}}</a></li>
                @endforeach
            </ul>

        </div>

        <ul>
            @foreach($types as $room)
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
                <li>
                <div>
                <a href="{{ $urlDetail }}">
                    <img src=" /chotel1/storage/app/files/{{$room->picture}} " alt="" height="150px" width="230px"></a> <span></span>
                </div>
                <div>
                    <div>
                        <h3>{{$rname}}</h3>
                        <div>
                            <span>Tiện ích: {{$util}}</span>
                        </div>
                    </div>
                    <p>
                        {{Str::limit($description) }} 
                    </p>
                    <a href="{{ $urlDetail }}">Chi tiết</a>
                </div>
                </li>
                @endforeach
        </ul>
        <ul class="paging">
            {{$types->links()}}
        </ul>
    </div>
@endsection
