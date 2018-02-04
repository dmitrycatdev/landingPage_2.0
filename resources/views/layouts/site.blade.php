<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>DEAD</title>
<link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/style0.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css"> 
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

<header id="header_wrapper">
    @yield('header')
</header>
<!--Header_section--> 

<!--Hero_Section-->
    @yield('content')

<script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-scrolltofixed.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.nav.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.isotope.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/wow.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    $(window).scroll(function(){
        if($(window).scrollTop()>300){
            $("#header_wrapper").addClass("header_scroll_up");
            $('#header_wrapper').removeClass("header_scroll_down");
        } else {
            $("#header_wrapper").removeClass("header_scroll_up");
            $('#header_wrapper').addClass("header_scroll_down");
        }
    });
</script>
</body>
</html>