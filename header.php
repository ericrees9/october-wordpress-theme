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
        <aside class="sidebar">
            <nav class="site-navigation">
                <?php if(!is_front_page()): ?>
                    <a class="home-nav-link" href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <?php endif; ?>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav-menu',
                        'container'      => false
                    ) );
                ?>
            </nav>
            <div class="nav-toggles">
            </div>
        </aside>

        <main class="content">
