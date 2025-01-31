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
        <!-- Sidebar Navigation -->
        <aside class="sidebar">

            <nav class="site-navigation">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav-menu',
                        'container'      => false
                    ) );
                ?>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header class="site-header">
                <h1><?php bloginfo( 'name' ); ?></h1>
            </header>
