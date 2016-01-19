<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <?php wp_head(); ?>
</head>
<body>
<section class="first-screen">
    <header>
        <div class="container">
            <div class="wrap-logo-social">
                <a href="<?php echo home_url()?>" class="logo"><img src="<?php bloginfo('template_url')?>/includes/img/logo.png" width="119" height="39" alt="logo"/></a>
                <ul class="social">
                    <li><a class="fa fa-twitter" href="#"></a></li>
                    <li><a class="fa fa-facebook" href="#"></a></li>
                    <li><a class="fa fa-rss" href="#"></a></li>
                </ul>
            </div>

            <form action="#" class="search-form">
                <input type="text" placeholder="search..."/>
            </form>

            <nav class="navbar navbar-default">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php wp_nav_menu(
                            array(
                                'theme_location' 	=> 'primary',
                                'depth'             => 2,
                                'container'         => 'false',
                                'menu_class' 		=> 'nav navbar-nav',
                                'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
                                'menu_id'			=> 'main-menu',
                                'walker' 			=> new wp_bootstrap_navwalker()
                            )
                        ); ?>
                    <a href="#" class="search "><span class="fa fa-search"></span></a>
                </div>

            </nav>
        </div>
    </header>