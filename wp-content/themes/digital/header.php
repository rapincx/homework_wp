<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skokov
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <header id="masthead">
        <section class="title-banner" style="background: url('<?php echo get_theme_mod('img-upload');?>') center/cover no-repeat;">
        <div class="container">
            <div class="row">
                <nav id="navbar-main" class="navbar navbar-default menu ">
                    <div class="container ">
                        <div class="row">
                            <div class="navbar-header menu">
                                <button type="button" class="navbar-toggle collapsed button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <h1 class="header"><?php echo get_custom_logo();?></h1>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <?php wp_nav_menu(array( 'theme_location' => 'digital', 'menu_class' => 'nav navbar-nav nav-position', 'menu' => 'header' ) ); ?>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="col-xs-offset-2 col-sm-offset-3 col-xs-8 col-sm-6 center">
                        <img class="img-responsive" src="<?php echo get_theme_mod('img-logo');?>" alt="logo2"/>
                </div>

            </div>
        </div>
        </section>
    </header>

    <div id="content" class="site-content">
