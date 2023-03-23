<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset=<?php bloginfo('charset');?>>
    <meta http-equiv='X-UA-Compatible' content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title> Главная </title>

    <?php wp_head();?>
</head>
<body>
<header class="main-header">
    <div class="wrapper main-header__wrap">
        <?php
        if(has_custom_logo()){ // если логотип есть
            echo get_custom_logo();
        }else {
            $site_name = get_bloginfo('name');
            if (is_front_page()){
                echo '<p class="main-heading about__h">'. $site_name .'</p>';
            }else{
                echo '<a class="main-heading about__h" href="'. $site_name .'">Sport</a>';
            }
        }
        ?>
        <nav class="main-navigation">
        <?php wp_nav_menu(array(
                "Theme_location" => "header",
                "container" => false,
                "menu_class" => "main-navigation__list",
        ))?>
        </nav>
        <?php get_template_part('template-parts/contacts', 'form') ?>
        <button class="main-header__mobile">
            <span class="sr-only">Открыть мобильное меню</span>
        </button>
    </div>
</header>
