<?php
add_theme_support( 'post-thumbnails' );//включаем поддержку миниатюр записи

//Включаем поддержку меню темой
add_action( 'after_setup_theme', 'theme_register_nav_menu' );

function theme_register_nav_menu() {
    register_nav_menu( 'primary', 'Primary Menu' );
}
