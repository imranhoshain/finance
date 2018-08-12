<?php
//$enable_search = cs_get_option('enable_search');

?>
    <!-- Header-Area Start -->
    <div id="home" class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="header-title">
                        <span>We are business company</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="header-info">
                        <ul>
                            <li><i class="fa fa-envelope"></i> Finance@gmail.com</li>
                            <li><i class="fa fa-phone"></i> +12249991971</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-area">
        <nav id="mainmenu" class="mainmenu-wrap">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navMenu" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    <!-- mobile menu button, shows only in mobile -->
                    <div class="logo-area">                        
                        <?php
                            get_template_part( 'template-parts/headers/logo');
                        ?>
                    </div>
                    <!-- main logo here -->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse collapse" id="navMenu">
                    <?php
                       wp_nav_menu( array(
                            'menu'              => 'Main Menu',
                            'theme_location'    => 'main_menu',
                            'depth'             => 3,
                            'container'         => 'ul',
                            'container_class'   => 'nav navbar-nav navbar-right',
                            'menu_class'        => 'smooth-menu',
                            'menu_id'           => '',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>  
                    <ul class="">
                        <li class=""><a href="#home">home</a></li>
                        <li class="smooth-menu"><a href="#service">service </a></li>
                        <li class="smooth-menu"><a href="#about">about </a></li>
                        <li class="smooth-menu"><a href="#portfolio">portfolio </a></li>
                        <li class="smooth-menu"><a href="#team">team </a></li>
                        <li class="smooth-menu"><a href="#testimonial">testimonial </a></li>
                        <li class="smooth-menu"><a href="#contact">contact </a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
    </div>
    <!-- Header-Area End -->