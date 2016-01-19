<footer>
    <div class="container">
        <section class="site-descr col-md-5">
            <div class="wrap-logo-social">
                <a href="<?php echo home_url()?>" class="logo"><img src="<?php bloginfo('template_url')?>/includes/img/logo.png" width="119" height="39" alt="logo"/></a>
                <ul class="social">
                    <li><a class="fa fa-twitter" href="#"></a></li>
                    <li><a class="fa fa-facebook" href="#"></a></li>
                    <li><a class="fa fa-rss" href="#"></a></li>
                </ul>
            </div>
            <p><?php bloginfo('description'); ?></p>
        </section>

        <?php if(!dynamic_sidebar('sidebar')): ?>
        <?php endif; ?>
        <?php the_widget('wp_widget_text')?>

        <?php if(!dynamic_sidebar('newsletter')): ?>
        <?php endif; ?>
        <?php the_widget('wp_widget_text')?>



        <section class="col-sm-12 bottom-footer">
            <p>Copyright <?php the_time(Y) ?> <a href="<?php echo home_url()?>">Deliver.</a> All Rights Reserved.</p>

            <?php wp_nav_menu(
                array(
                    'theme_location' 	=> 'footer-menu',
                    'depth'             => 2,
                    'container'         => 'false',
                    'fallback_cb' 		=> '__return_empty_string'
                )
            ); ?>



        </section>
    </div>
</footer>

<?php wp_footer(); ?>


</body>
</html>

