@extends('templates.chotel.master')

@section('main-content')
    <div class="home">
        <div class="featured">
            <img src="{{ $publicUrl }}/images/featured.jpg" alt="">
            <div>
                <div>
                    <p>Mô tả khách sạn nổi bật ngẫu nhiên</p>
                    <a href="about.html"></a>
                </div>
            </div>
        </div>
        @php
        	function doimau($str,$tukhoa){
        		return str_replace($tukhoa,"<span style='color: red'>$tukhoa</span>",$str);
        }
        @endphp
        <div>
            <ul>
                @foreach ($search as $item)
                    @php
                    $rid = $item->rid;
                    $uid = $item->uid;
                    $typeId = $item->type_id;
                    $rname = $item->rname;
                    $description = Str::limit($item->description,160);
                    $slug = Str::slug($rname);
                    $urlDetail = route('chotel.room.detail', [$slug, $rid,$typeId]);
                    @endphp
                    <li>
                        <a href="detail.php">
                            <img src=" /chotel1/storage/app/files/{{$item->picture}} " alt="" height="100px" width="230px"></a>
                        <h3 class="title"><a href="{{ $urlDetail }}">{!! doimau($rname,$tukhoa)!!}</a></h3>
                        <h3>Tiện ích: {{ $uid }}</h3>
                        <p>
                            {{ $description }}
                        </p>
                        <a href="{{ $urlDetail }}" class="click-here"></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="blog">
        
    </div>
@endsection
