<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package burg
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php
        $site_description = get_bloginfo('description', 'display');
        $site_name = get_bloginfo('name');
        //for home page
        if ($site_description && (is_home() || is_front_page())):
            echo $site_name;
            echo ' | ';
            echo $site_description;
        endif;
        // for other post pages
        if (!(is_home()) && !is_404()):
            the_title();
            echo ' | ';
            echo $site_name;
        endif;
        ?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/jquery.fancybox.min.css' ?>">

    <?php wp_head(); ?>
</head>
    <body>
    <div class="wrapper">
        <div class="content">
            <header class="header">
                <div class="container">
                    <?php if (has_custom_logo()): the_custom_logo(); ?>
                    <?php else: ?>
                        <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                    <?php endif; ?>
                    <ul class="header-desktop">
                        <li><a href="<?php echo get_page_link(121); ?>">Litepaper</a></li>
                        <li><a class="scroll-to" href="#about">About us</a></li>
                        <li><a class="scroll-to" href="#road">Roadmap</a></li>
                        <?php if (get_field('activation_videos')) { ?>
                            <li><a class="scroll-to" href="#video">Videos</a></li>
                        <?php } ?>
                        <?php if (get_field('activation_team')) { ?>
                            <li><a class="scroll-to" href="#team">Team</a></li>
                        <?php } ?>
                        <?php if (get_field('activation_our_backers')) { ?>
                            <li><a class="scroll-to" href="#backers">Backers</a></li>
                        <?php } ?>

                    </ul>
                    <div class="header__btn-inner">
                        <button type="button" class="header__btn js-menu-open">
                            Menu
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23" viewBox="0 0 24 23"
                                 fill="none">
                                <rect width="24" height="3" rx="1.5" fill="white" />
                                <rect x="6" y="10" width="18" height="3" rx="1.5" fill="white" />
                                <rect y="20" width="24" height="3" rx="1.5" fill="white" />
                            </svg>
                        </button>
                        <div class="header__menu js-menu">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="header__menu-top">
                                        <?php if (has_custom_logo()): the_custom_logo(); ?>
                                        <?php else: ?>
                                            <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                                        <?php endif; ?>

                                        <button type="button " class="header__btn js-menu-close">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.259766" y="17.6919" width="24.8148" height="3.10186" rx="1.55093" transform="rotate(-45 0.259766 17.6919)" fill="white"/>
                                                <rect x="2.32812" y="0.114738" width="24.8148" height="3.10186" rx="1.55093" transform="rotate(45 2.32812 0.114738)" fill="white"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <nav class="menu">
                                        <ul class="menu__list">
                                            <li><a href="<?php echo get_page_link(121); ?>">Litepaper</a></li>
                                            <li><a class="scroll-to" href="<?php echo get_home_url(); ?>/#about">About dormint</a></li>
                                            <li><a class="scroll-to" href="<?php echo get_home_url(); ?>/#road">Roadmap </a></li>
                                            <li><a class="scroll-to" href="<?php echo get_home_url(); ?>/#video">Videos</a></li>
                                            <li><a class="scroll-to" href="<?php echo get_home_url(); ?>/#team">Team</a></li>
                                            <li><a class="scroll-to" href="<?php echo get_home_url(); ?>/#backers">Backers</a></li>
                                        </ul>
                                    </nav>
                                    <div class="banner__buttons banner__buttons-mmenu">
                                        <a class="btn" data-src="#app-store-popup" data-fancybox>
                                            <img src="<?php echo get_template_directory_uri() . '/src/img/app-store.svg' ?>" alt="">
                                        </a>
                                        <a class="btn" data-src="#google-play-popup" data-fancybox>
                                            <img src="<?php echo get_template_directory_uri() . '/src/img/google.svg' ?>" alt="">
                                        </a>
                                    </div>

<!--                                    <div class="menu__bottom">-->
<!--                                        <button class="btn">download now →</button>-->
<!--                                    </div>-->
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </header>
