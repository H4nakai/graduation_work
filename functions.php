<?php
function my_setup()
{
  add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // タイトルタグ自動生成
  add_theme_support(
    'html5',
    array( //HTML5でマークアップ
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}

add_action('after_setup_theme', 'my_setup');


/*================================
css,js読み込み
==================================*/
function my_script_init()
{
wp_enqueue_style( 'my_stylesheet_animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0.0', 'all');
wp_enqueue_style('my_stylesheet', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
wp_enqueue_script( 'my_script_wow', get_template_directory_uri() . '/js/wow.min.js', array(), '1.1.2', true );
wp_enqueue_script( 'my_script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'my_script_init');

function load_google_cdn() {
    if ( !is_admin() ){
      //jQueryを登録解除
      wp_deregister_script( 'jquery' );
      
      //Google CDNのjQueryを出力
      wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), NULL, true );
    }
  }
  add_action( 'init', 'load_google_cdn' );

  
  // Contact Form7の送信ボタンをクリックした後の遷移先設定
  add_action( 'wp_footer', 'add_origin_thanks_page' );
    function add_origin_thanks_page() {
      echo <<< EOC
        <script>
         document.addEventListener( 'wpcf7mailsent', function( event ) {
           location = 'http://localhost:8888/Graduation_work/thanks/';
         }, false );
        </script>
      EOC;
    }
?>