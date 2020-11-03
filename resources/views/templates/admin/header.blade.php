<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdminCP | VinaEnter Edu</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{$adminUrl}}/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{$adminUrl}}/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{$adminUrl}}/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="{{$adminUrl}}/js/jquery-1.10.2.js"></script>
    <script src="{{$adminUrl}}/jquery.validate.min.js"></script>
    <script src="{{$adminUrl}}/ckeditor/ckeditor.js"></script>
    <script src="{{$adminUrl}}/ckfinder/ckfinder.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">VinaEnter Edu</a>
            </div>
            @php
                if(Auth::check()){
                $user = Auth::user();

                $username = $user->username;
                $fullname = $user->fullname;
                $text = "Dang xuat";
                $url = route('auth.auth.logout');
            }else{
                $fullname = "Khach";
                $text = "Dang nhap";
                $url = route('auth.auth.login');
              }
                
            @endphp
            <div style="color: white;
            }
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Xin chào, <b>{{$fullname}}<b> &nbsp; <a href="{{$url}}" class="btn btn-danger square-btn-adjust">{{$text}}</a> </div>
        </nav>
        <!-- /. NAV TOP  -->