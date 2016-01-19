<?php get_header()?>

<!--    <div id="owl-demo" class="owl-carousel owl-theme">-->
<!--        <div class="item slide1">-->
<!--            <h1 class="text-center">We <span>Deliver</span> nothing Short of Awesome!</h1>-->
<!--            <p class="text-center">Check out our portfolio to see our great work.</p>-->
<!--            <p class="btn-portfolio"><a href="#">Portfolio</a></p>-->
<!--        </div>-->
<!--        <div class="item slide2">-->
<!--            <h1 class="text-center">We <span>Deliver</span> nothing Short of Awesome!</h1>-->
<!--            <p class="text-center">Check out our portfolio to see our great work.</p>-->
<!--            <p class="btn-portfolio"><a href="#">Portfolio</a></p>-->
<!--        </div>-->
<!--    </div>-->

<div id="owl-demo" class="owl-carousel owl-theme">
    <?php $slider = new WP_Query( array('post_type' => '$slider', 'posts_per_page' => -1)); ?>
    <?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
        <!-- post -->

        <div class="item">
            <h1><?php the_title()?></h1>
            <?php the_post_thumbnail('full')?>
            <?php the_content()?>
            <p class="btn-portfolio"><a href="#">Portfolio</a></p>
        </div>

    <?php endwhile; ?>
    <!-- post navigation -->
</div>





</section>
<section class="services">
    <div class="container">
        <h2>We are a Small Team Doing Big Things!</h2>
        <p class="descr-section">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent justo ligula, interdum ut lobortis quis, interdum vitae metus. Proin fringilla metus non nulla cursus, sit amet rutrum est pretium.</p>
        <ul class="clearfix">
            <?php $services = new WP_Query( array('post_type' => '$services', 'posts_per_page' => -1)); ?>
            <?php while ( $services->have_posts() ) : $services->the_post(); ?>
                <!-- post -->
                <li class="col-sm-4">
                    <div class="wrap-img">
                        <?php the_post_thumbnail('full')?>
                    </div>
                    <h3><?php the_title()?></h3>
                    <?php the_excerpt()?>
                    <a href="<?php the_permalink()?>">Find Out More</a>
                </li>
            <?php endwhile; ?>
            <!-- post navigation -->
        </ul>
    </div>
</section>
<section class="latest-work">
    <div class="container">
        <h2>Some of Our Latest Work</h2>
        <p class="descr-section">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent justo ligula, interdum ut lobortis quis, interdum vitae metus. Proin fringilla metus non nulla cursus, sit amet rutrum est pretium.</p>

        <ul class="clearfix">
            <?php $latestWork = new WP_Query( array('post_type' => '$latestWork', 'posts_per_page' => -1)); ?>
            <?php while ( $latestWork->have_posts() ) : $latestWork->the_post(); ?>
                <!-- post -->
                <li class="col-sm-4">
                    <a href="#">
                        <?php the_post_thumbnail('full')?>
                        <div class="overlay">
                            <i class="fa fa-plus-square fa-4x"></i>
                        </div>
                    </a>
                    <h3><?php the_title()?></h3>
                </li>
            <?php endwhile; ?>
            <!-- post navigation -->
        </ul>
    </div>

</section>
<section class="call-to-action">
    <div class="container">


        <?php if(!dynamic_sidebar('call2action')): ?>
        <?php endif; ?>
        <?php the_widget('wp_widget_text')?>


        <a href="#">Purchase</a>
    </div>
</section>

<?php get_footer()?>






