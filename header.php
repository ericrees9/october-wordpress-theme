<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="site-container">
        <div class="mobile-menu-btn">
            <input type="checkbox" id="mobile_menu_checkbox">
            <label for="mobile_menu_checkbox">
                <div></div>
                <div></div>
                <div></div>
            </label>
        </div>
        <aside class="sidebar" id="sidebar">
            <nav class="site-navigation">
                <a href="<?php echo esc_url(home_url('/')); ?>" id="home-link">Home</a>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav-menu',
                        'container'      => false
                    ) );
                ?>
            </nav>
            <div class="nav-toggles">
                <div class ="toggle-switch">
                    <div class="word-wrapper">
                        <div class="dark-words">dark</div>
                        <div class="light-words">light</div>
                    </div>
                    <label>
                        <input type ="checkbox">
                        <span class ="toggle-slider dark" id="dl-slider"></span>
                    </label>
                </div>
            </div>
        </aside>

        <main class="content">
