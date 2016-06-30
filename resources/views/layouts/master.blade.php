<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | BMT AL-ISHLAH</title>
        <!--fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--//fonts-->
        <link href="{{URL::to('upload/icon/favicon.ico')}}" rel="shortcut icon">
        <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        @yield('style')
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <script src="{{URL::to('js/jquery.min.js')}}"></script>
        @yield('script')
    </head>
    <body>
        <!-- header -->
        <div class="header">
            <div class="container">
                <div class="logo">
                    <a href="index.html"><img src="{{URL::to('images/logo.png')}}" alt=""/></a>
                </div>
                <div class="search">
                    <form>
                        <input type="search" value="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'search';}" required="">
                        <input type="submit" value=" ">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //header -->
        <!-- navigation -->
        @include('includes.navbar')
        <!-- //navigation -->
        
        <!-- banner-bottom -->
        @yield('maincontent')
        <!-- //banner-bottom -->
        <!-- news-bottom -->
        @include('includes.news-bottom')
        <!-- //news-bottom -->
        <!-- footer -->
        <div class="footer">
            <div class="container" style="text-align:center">
                <p>Copyright &copy; {{ date("Y")}}</p>
            </div>
        </div>
        <!-- footer -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- js -->
        <script src="{{URL::to('js/bootstrap.js')}}"></script>
        @yield('bottom-script')
        <script>
        $(function(){
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
                },
                function() {
                    $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
            });
        });
        
        </script>
        <!-- js -->
    </body>
</html>