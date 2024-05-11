<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fictional University</title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="site-header">
        <div class="container" style="display: flex;">
            <h1 class="school-logo-text float-left">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php
                    $name = get_bloginfo('name');
                    $nameString = explode(' ', $name);
                    for ($i = 0; $i < count($nameString); $i++) {
                        if ($i == 0) {
                            echo '<strong>' . $nameString[$i] . '</strong>';
                        } else {
                            echo '<span>' . $nameString[$i] . '</span>';
                        }
                    }
                    ?>
                </a>
            </h1>
            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
            <div class="site-header__menu group">
                <div class="site-header__menu--left ">
                    <nav class="main-navigation">
                        <ul>
                            <!-- <li <?php if (is_page('about-us') or wp_get_post_parent_id(get_the_ID()))
                                            echo 'class="current-menu-item"'; ?>><a href="<?php echo site_url('/about-us'); ?>">About Us</a>
                            </li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Campuses</a></li>
                            <li 
                            <?php if (get_post_type() == 'post')
                                echo 'class="current-menu-item"' ?>><a
                                        href="<?php echo site_url('/blog'); ?>">Blog</a></li> -->
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'themeLocationOne'
                                )
                            );
                            ?>
                        </ul>
                    </nav>
                    <div class="site-header__util">
                        <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                        <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
                        <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                </div>
                <!-- <div class="site-header__menu--right"></div> -->
            </div>
        </div>
    </header>