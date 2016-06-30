<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $__env->yieldContent('title'); ?> | BMT AL-ISHLAH</title>
        <!--fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--//fonts-->
        <link href="<?php echo e(URL::to('upload/icon/favicon.ico')); ?>" rel="shortcut icon">
        <link href="<?php echo e(URL::to('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::to('css/style.css')); ?>" rel="stylesheet" type="text/css" media="all" />
        <?php echo $__env->yieldContent('style'); ?>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <script src="<?php echo e(URL::to('js/jquery.min.js')); ?>"></script>
        <?php echo $__env->yieldContent('script'); ?>
    </head>
    <body>
        <!-- header -->
        <div class="header">
            <div class="container">
                <div class="logo">
                    <a href="index.html"><img src="<?php echo e(URL::to('images/logo.png')); ?>" alt=""/></a>
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
        <?php echo $__env->make('includes.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- //navigation -->
        
        <!-- banner-bottom -->
        <?php echo $__env->yieldContent('maincontent'); ?>
        <!-- //banner-bottom -->
        <!-- news-bottom -->
        <?php echo $__env->make('includes.news-bottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- //news-bottom -->
        <!-- footer -->
        <div class="footer">
            <div class="container" style="text-align:center">
                <p>Copyright &copy; <?php echo e(date("Y")); ?></p>
            </div>
        </div>
        <!-- footer -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- js -->
        <script src="<?php echo e(URL::to('js/bootstrap.js')); ?>"></script>
        <?php echo $__env->yieldContent('bottom-script'); ?>
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