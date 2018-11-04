<?php


/**
 * ウィジェットエリアを定義します。
 */
 
 register_sidebar(array(
   
   'name'          => 'デモサイトのサイドバー',
   'id'            => 'primary-widget-area',
   'description'   => 'サイドバーに表示されるウィジェットエリアです。',
   'before_widget' => '<section id="%1$s" class="widget %2$s">',
   'after_widget'  => '</section>',
   'before_title'  => '<h3 class="widget-title">',
   'after_title'   => '</h3>',
 ));



 /**
 * アイキャッチ画像の機能を有効化
 */

add_theme_support( 'post-thumbnails' );

/**
 * 子テーマのスタイル継承
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' , array('parent-style') );
}

 ?>