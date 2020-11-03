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
            <!--<ul>
                @foreach($room_type as $item)
                <li><a href="{{ route('chotel.room.list',['slug' => 'chi-tiet-phong', 'id' => $item->type_id]) }}">{{ $item->tname}}</a></li>
                @endforeach
            </ul>-->
            
        </div>

        <ul>

                @foreach($items as $item)
                 @php
                    $rid = $item->rid;
                    $uid = $item->uid;
                    $typeId = $item->type_id;
                    $rname = $item->rname;
                    $tname = $item->tname;
                    $util = $item->uname;
                    $description = Str::limit($item->description,160);
                    $slug = Str::slug($rname);
                    $urlDetail = route('chotel.room.detail', ['slug' => $slug, 'id' => $rid,'typeId'=>$typeId]);
                @endphp

                <li>
                <div>
                <a href="{{ $urlDetail }}"><img src="/chotel1/storage/app/files/{{$item->picture}}" alt="" height="130px" width="240px"></a> <span></span>
                </div>
                <div>
                    <div>
                        <h3>{{$item->rname}}</h3>
                        <div>
                            <span>Tiện ích: {{$item->uname}}</span>
                        </div>
                    </div>
                    <p>
                        {{Str::limit($item->description,160) }} 
                    </p>
                    <a href="{{ $urlDetail }}">Chi tiết</a>
                </div>
                </li>
                @endforeach
        </ul>
        <ul class="paging">
           {{$items->links()}}
        </ul>
    </div>
@endsection
