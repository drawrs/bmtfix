<div class="banner">
    <div class="container">
<!-- responsiveslides -->
                    <script src="<?php echo e(URL::to('js/responsiveslides.min.js')); ?>"></script>
                        <script>
                            // You can also use "$(window).load(function() {"
                            $(function () {
                             // Slideshow 4
                            $("#slider3").responsiveSlides({
                                auto: true,
                                pager: false,
                                nav: true,
                                speed: 500,
                                namespace: "callbacks",
                                before: function () {
                            $('.events').append("<li>before event fired.</li>");
                            },
                            after: function () {
                                $('.events').append("<li>after event fired.</li>");
                                }
                                });
                                });
                        </script>
            <!-- responsiveslides -->
        <div  id="top" class="callbacks_container">
                    <ul class="rslides" id="slider3">
                        <?php foreach($slides as $slide): ?>
                        <li>
                            <div class="banner-info">
                                <div class="bann-top" style="background: url( <?php echo e(URL::to($slidePath .''. $slide->content)); ?> ) no-repeat 0px 0px; background-size:100%;">
                                    <div class="banner-right">
                                        <div class="bann-pad">
                                              <h1 ><?php echo e($slide->title); ?></h1>
                                              <p><?php echo $slide->desk; ?> </p>
                                              <a href="http://<?php echo e($slide->target); ?>">Read More</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
        </div>
    </div>
</div>