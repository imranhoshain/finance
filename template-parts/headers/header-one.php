
    <!-- Header-Area Start -->
    <div id="home" class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="header-title">
                        <?php 
                            $header_top_text = cs_get_option('header_top_left_text');
                            if(!empty($header_top_text)) :                                
                        ?>
                            <span><?php echo $header_top_text; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <?php 
                        $header_top_right_array = cs_get_option('header_top_right_array');
                        if(!empty($header_top_right_array)) :                                
                    ?> 
                        <div class="header-info">
                            <ul>
                                <?php 
                                    foreach ($header_top_right_array as $header_top_right ) :

                                ?>
                                    <li><i style="color: <?php echo $header_top_right['header_top_icon_color']?>" class="<?php echo $header_top_right['header_top_icon']?>"></i><?php echo $header_top_right['header_sub_title']?> </li> 

                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
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
                            'menu_class'        => 'nav navbar-nav navbar-right',
                            'menu_id'           => '',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>                    
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
    </div>
    <!-- Header-Area End -->