<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content">
    <?php esc_html_e( 'Skip to content', 'silaslite' ); ?></a>
    <div class="body-overlay"></div>
    
    <div class="main-wrapper-boxed">
        <header id="silaslite-header" class="header">
            <div class="header-wrapper">
                <div class="header-maintop">
                    <div id="nav-wrapper" class="nav-main silaslite-main-nav">
                        <?php
                            wp_nav_menu( array (
                                'container' => false,
                                'theme_location' => 'primary',
                                'menu_class' => 'silaslite-main-menu',
                                'depth' => 3,
                            ) );
                        ?>
                    </div>
                    <div class="top-rightheader">
                        <?php get_template_part( 'template-parts/social', 'network') ?>
                        <div class="right-icon">
                            <a class="navbar-search" href="javascript:void(0)"><i class="fas fa-search"></i></a>
                            <div class="header-search">
                                <div class="inner-search-header">
                                    <?php get_search_form() ?>
                                    <a href="javascript:void(0)" class="close-search"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                            <div class="icon-touch d-lg-none">
                                <a href="javascript:void(0)" class="menu-touch">
                                    <div class="navbar-toggle">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        </div>       
                    </div>                    
                </div>
                <?php get_template_part( 'template-parts/logo', 'site' ) ?>
            </div>
        </header>
        <div id="content" class="silaslite-primary">
    