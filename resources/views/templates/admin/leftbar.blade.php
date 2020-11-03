<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="{{ $adminUrl }}/img/find_user.png" class="user-image img-responsive" />
            </li>
            <li>
                <a class="active-menu" href="{{ route('admin.index.index') }}"><i class="fa fa-dashboard fa-3x"></i> Trang chủ</a>
            </li>
            <li>
                <a href="{{ route('admin.roomType.index') }}"><i class="fa fa-bar-chart-o fa-3x"></i> Quản lý loại phòng</a>
            </li>
            <li>
                <a href="{{ route('admin.room.index') }}"><i class="fa fa-qrcode fa-3x"></i> Quản lý phòng</a>
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}"><i class="fa fa-sitemap fa-3x"></i> Quản lý người dùng</a>
            </li>
            <li>
                <a href="{{ route('admin.utility.index') }}"><i class="fa fa-sitemap fa-3x"></i> Quản lý tiện ích</a>
            </li>
        </ul>
    </div>
</nav>

<!-- /. NAV SIDE  -->
<!--
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="{{ $adminUrl }}/img/find_user.png" class="user-image img-responsive" />
            </li>
            @php
                $arrCat = [
                    'index'  =>'index',
                    'room-type' => 'roomType',
                    'room'=>'room',
                    'user'  =>  'user',
                    'utility' => 'utility'
                    
                ];
                $uri = Request::fullUrl();
                $temp = explode('/', $uri);
                $url = end($temp);
                foreach($arrCat as $cat=>$catItem){
                    
                    if($url == $cat){
                    $active = "active-menu";
                    
                    }else{
                    $active = '';
                    
                    }
                 
            @endphp
            
            <li>
                <a  class="{{ $active }}" href="{{ route('admin.'.$catItem.'.index') }}"><i class="fa fa-dashboard fa-3x"></i> Quản lý {{ $cat }}</a>
            </li>
            @php
                }
            @endphp
        </ul>
    </div>
</nav>
-->