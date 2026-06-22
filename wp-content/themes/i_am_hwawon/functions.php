<?php
/*========================================================
                        基本設定
========================================================*/
/************アイキャッチ**********/
function thumb_setup() {
  add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'thumb_setup' );

/************css & js 差し替え**********/
function default_script() {
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500;700;800;900&family=Open+Sans:wght@500;600;700;800&family=Roboto:wght@500;700;900&display=swap', array(), null);
  wp_enqueue_style('reset-style', get_template_directory_uri() . '/css/reset.css', array(), filemtime(get_template_directory() . '/css/reset.css'), 'all');
  wp_enqueue_style('common-style', get_template_directory_uri() . '/css/common.css', array(), filemtime(get_template_directory() . '/css/common.css'), 'all');
  wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery-4.0.0.min.js', array(), filemtime(get_template_directory() . '/js/jquery-4.0.0.min.js'), array('strategy' => 'defer', 'in_footer' => true));
  wp_enqueue_script('common-js', get_template_directory_uri() . '/js/common.js', array(), filemtime(get_template_directory() . '/js/common.js'), array('strategy' => 'defer', 'in_footer' => true));
  
  if(is_front_page()){
    wp_enqueue_style('top-style', get_template_directory_uri() . '/css/top.css', array(), filemtime(get_template_directory() . '/css/top.css'), 'all');
  }

  if (is_page()) {
    global $post;
  
    if ($post) {
      $css = "/css/{$post->post_name}.css";
      $css_path = get_template_directory() . $css;
  
      if (file_exists($css_path)) {
        wp_enqueue_style($post->post_name . '-style', get_template_directory_uri() . $css, array('common-style'), filemtime($css_path), 'all');
      }
    }
  }
  
  if (is_post_type_archive('work') || is_singular('work')) {
    $css_path = get_template_directory() . '/css/work.css';
  
    if (file_exists($css_path)) {
      wp_enqueue_style('work-style', get_template_directory_uri() . '/css/work.css', array('common-style'), filemtime($css_path), 'all');
    }
  }
}
add_action('wp_enqueue_scripts', 'default_script');

function add_google_fonts_preconnect($urls, $relation_type) {
  if ('preconnect' === $relation_type) {
    $urls[] = array(
      'href' => 'https://fonts.googleapis.com',
    );

    $urls[] = array(
      'href' => 'https://fonts.gstatic.com',
      'crossorigin' => 'anonymous',
    );
  }
  return $urls;
}

add_filter('wp_resource_hints', 'add_google_fonts_preconnect', 10, 2);


//***********wordpress headに要らないhead内容削除*************
add_action('init', function() {
	remove_filter('the_title', 'wptexturize');
	remove_filter('the_content', 'wptexturize');
	remove_filter('the_excerpt', 'wptexturize');
	remove_filter('the_title', 'wpautop');
	remove_filter('the_content', 'wpautop');
	remove_filter('the_excerpt', 'wpautop');
	remove_filter('the_editor_content', 'wp_richedit_pre');
});
remove_action('wp_robots', 'wp_robots_max_image_preview_large');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wpp-loading-animation-styles');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles', 10);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head','adjacent_posts_rel_link_wp_head');
add_filter( 'jetpack_enable_open_graph', '__return_false' );
function remove_recent_comment_css() {
  global $wp_widget_factory;
  remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action( 'widgets_init', 'remove_recent_comment_css');
add_action('wp_print_styles', 'my_deregister_styles', 100);

function my_deregister_styles() {
  wp_deregister_style('dashicons');
}

function remove_editor_style() {
  wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'remove_editor_style');

function remove_default_jquery() {
  if ( !is_admin() ) { wp_deregister_script( 'jquery' ); }
}
add_action('init', 'remove_default_jquery');

function remove_cssjs_ver2( $src ) {
if ( strpos( $src, 'ver=' ) )
$src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );

function my_delete_plugin_files() {
	wp_dequeue_style('googlesitekit-adminbar');
  wp_dequeue_style('classic-theme-styles');
  wp_dequeue_style('toc-screen');
	wp_dequeue_style('monsterinsights-vue-frontend-style');
	wp_dequeue_style('wordpress-popular-posts-css');
	wp_dequeue_style('tag-groups-css-frontend-structure');
	wp_dequeue_style('tag-groups-css-frontend-theme');
	wp_dequeue_style('tag-groups-css-frontend');
	wp_dequeue_style('aioseo/css/css/Caret.be535beb.css');
	wp_dequeue_style('aioseo/css/css/Index.736c3936.css');
	wp_dequeue_style('aioseo/css/css/FacebookPreview.43de9c16.css');
	wp_dequeue_style('aioseo/css/css/GoogleSearchPreview.c6958fc6.css');
	wp_dequeue_style('aioseo/css/css/TwitterPreview.dfa7e10d.css');
	wp_dequeue_style('aioseo/css/css/main.2557653b.css');
	wp_dequeue_style('aioseo/css/css/Tabs.fb196b90.css');
	wp_dequeue_style('aioseo/css/src/vue/assets/scss/app/admin-bar.scss');
}
add_action( 'wp_enqueue_scripts', 'my_delete_plugin_files' );

// global-styles-inline-css を非表示にする
add_action( 'wp_enqueue_scripts', 'remove_my_global_styles' );
function remove_my_global_styles() {
	wp_dequeue_style( 'global-styles' );
}

//自動でmetaタグのディスカッション設定
add_post_type_support( 'page', 'excerpt' );
remove_filter('the_excerpt', 'wpautop');
remove_filter('term_description','wpautop');

function remove_wpp_loading_animation_styles() { 
  wp_dequeue_style('wpp-loading-animation-styles');
}
add_action( 'wp_enqueue_scripts', 'remove_wpp_loading_animation_styles', 9999);