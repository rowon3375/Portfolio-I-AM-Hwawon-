<?php
/*========================================================
                        基本設定
========================================================*/
$under_column = '1';

/******************
アイキャッチを出力
******************/
function thumb_setup() {
   add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'thumb_setup' );

/******************
css & js 差し替え
******************/
function register_common_script()
{
    // jQuery差し替え
  wp_deregister_script('jquery');
 	wp_enqueue_script('jquery', get_template_directory_uri().'/assets/js/main.js');
}
add_action('wp_enqueue_scripts', 'register_common_script');

function register_default_script()
{
// </head>
wp_enqueue_style('main-style', get_template_directory_uri().'/assets/css/main.css?t='.time(), array(), false, false);
}
add_action('wp_enqueue_scripts', 'register_default_script');


//***********wordpress headに要らないhead内容削除*************
// オートフォーマット関連の無効化
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

// バージョン表記
remove_action('wp_head', 'wp_generator');

// RSSフィードのURL
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

// 絵文字
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles', 10);

// REST APIのURL表示
remove_action('wp_head', 'rest_output_link_wp_head');

// 外部ブログツールからの投稿を受け入れ
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

//rel=”canonical”の表示削除
remove_action('wp_head', 'rel_canonical');

// バージョン表記
remove_action('wp_head', 'wp_generator');

// 短縮URL
remove_action('wp_head', 'wp_shortlink_wp_head');

//rel="next" rel="prev" を非表示にする
remove_action('wp_head','adjacent_posts_rel_link_wp_head');

// Jetpack Open graph tags
add_filter( 'jetpack_enable_open_graph', '__return_false' );

// ウィジェット「最近のコメント」の表示
function remove_recent_comment_css() {
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action( 'widgets_init', 'remove_recent_comment_css');

//WordPressアイコンを表示
add_action('wp_print_styles', 'my_deregister_styles', 100);
function my_deregister_styles() {
  wp_deregister_style('dashicons');
}

//ブロックエディタ（Gutenberg）のためのCSS
function remove_editor_style() {
  wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'remove_editor_style');

//jQueryの読み込みをさせない
function remove_default_jquery() {
  if ( !is_admin() ) { wp_deregister_script( 'jquery' ); }
}
add_action('init', 'remove_default_jquery');

//全てののバージョンの表示の削除
function remove_cssjs_ver2( $src ) {
if ( strpos( $src, 'ver=' ) )
$src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );


//wp_head内のプラグインの不要なCSSを読み込まない
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

//Site Kit by GoogleのメタタグのGenerator情報削除
function remove_googlesitekit_meta_tag() { return ''; }
add_filter( 'googlesitekit_generator', 'remove_googlesitekit_meta_tag' );

//自動でmetaタグのディスカッション設定
add_post_type_support( 'page', 'excerpt' );
remove_filter('the_excerpt', 'wpautop');
remove_filter('term_description','wpautop');

function remove_wpp_loading_animation_styles() {
    //プラグインIDを指定し解除する
    wp_dequeue_style('wpp-loading-animation-styles');
}
add_action( 'wp_enqueue_scripts', 'remove_wpp_loading_animation_styles', 9999);


/*========================================================
                        カスタマイズ
========================================================*/
/*********************
メタタグ＆OGPタグ設定
*********************/
function set_meta_ogp() {
  global $post;
  $insert = '';
  $ogp_url = '';
  $ogp_img = 'https://www.webdesigner-kyujin.com/blog/wp-content/uploads/ogp.png';
  $ogp_description = '';
  $ogp_title = '';
  
  if ( is_front_page() || is_home() || is_tag() || is_category() || is_search() ) {
  // トップページ
  $my_descr = get_option('home_description');
  $ogp_description = $my_descr ? $my_descr : get_bloginfo('description');
  $insert .= '<meta name="description" content="'.esc_attr($ogp_description).'" />' . "\n";
  $insert .= '<meta name="keywords" content="Webデザイナー,ウェブデザイナー,求人,ブログ,転職,就職" />' . "\n";
  $catchy = (get_bloginfo('description')) ? get_bloginfo('description').'｜' : "";//キャッチフレーズ
  $ogp_title = $catchy.get_bloginfo('name');
  $ogp_url = home_url();
  } elseif (is_singular()) {
  // 記事＆固定ページ
  setup_postdata($post);
  $ogp_title = $post->post_title;
  $ogp_description = mb_substr(get_the_excerpt(), 0, 100);
  $ogp_url = get_permalink();
  
  
  if (get_post_meta( $post->ID, 'description', true ) ) {
  //投稿ページでデスクリプションが入力されている場合
  $descr = get_post_meta( $post->ID, 'description', true );
  $insert .= '<meta name="description" content="'.esc_attr($descr).'" />' . "\n";
  } else {
  setup_postdata($post);
  $descr = get_the_excerpt();
  wp_reset_postdata();
  $insert .= '<meta name="description" content="'.esc_attr($descr).'" />' . "\n";
  }
  }
  elseif ( is_category() ) {
  //カテゴリーページ
  $cats = get_the_category();
  if (!empty($cats['category_description'])) {
  $descr = esc_attr( $cats['category_description'] );
  $insert .= '<meta name="description" content="'.$descr.'" />' . "\n";
  } else {
  //カテゴリーページで本文が入力されていない場合はog:descriptionに以下の文を出力
  $descr = get_bloginfo('name').'の「'.single_cat_title( '', false ).'」についての投稿一覧です。';
  $insert .= '<meta name="description" content="'.esc_attr($descr).'" />' . "\n";
  }
  $insert .= '<meta name="keywords" content="'.single_cat_title( '', false ).'" />' . "\n";
  $ogp_title = $descr;
  $ogp_description = mb_substr(get_the_excerpt(), 0, 100);
  $ogp_url = get_category_link( $cats[0]->cat_ID );
  }
  
  
  // og:image
  if (is_singular() && has_post_thumbnail()) {
  $ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
  $ogp_img = $ps_thumb[0];
  }
  
  
  // og:type
  $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';
  
  
  //出力するOGPタグをまとめる
  $insert .= '<meta property="og:title" content="'.esc_attr($ogp_title).'" />' . "\n";
  $insert .= '<meta property="og:description" content="'.esc_attr($ogp_description).'" />' . "\n";
  $insert .= '<meta property="og:type" content="'.$ogp_type.'" />' . "\n";
  $insert .= '<meta property="og:url" content="'.esc_url($ogp_url).'" />' . "\n";
  $insert .= '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />' . "\n";
  $insert .= '<meta property="og:image" content="'.esc_url($ogp_img).'" />' . "\n";
  // TwitterのOGPタグ
  $insert .= '<meta name="twitter:site" content="＠kyujinguide_">' . "\n";
  $insert .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
  $insert .= '<meta name="twitter:image" content="'.esc_url($ogp_img).'" />' . "\n";
  //facebookのappdid
  $insert .= '<meta property="fb:app_id" content="staff@srce.jp" />'. "\n";
  $insert .= '<meta property="fb:admins" content="srce.staff@gmail.com " />'. "\n";
  $insert .= '<meta property="fb:image" content="'.esc_url($ogp_img).'" />' . "\n";
  
  
  echo $insert;
  }
  
  
  add_action('wp_head','set_meta_ogp', 1);


/******************
canonical 設定
******************/
remove_action('wp_head', 'rel_canonical');
add_action( 'wp_head', 'add_canonical', 2);
function add_canonical() {
$canonical = null;
 
if( is_home() || is_front_page() ) {
$canonical = 'https://www.webdesigner-kyujin.com/blog/';
} elseif ( is_category() ) {
$canonical = get_category_link( get_query_var('cat') );
} else if(is_tag()){
$canonical = get_tag_link(get_queried_object()->term_id);
} elseif ( is_search() ) {
$canonical = get_search_link();
} elseif ( is_page() || is_single() ) {
$canonical = get_permalink();
} else{
$canonical = home_url();
}
echo '<link rel="canonical" href="'.$canonical.'">'."\n";
}


/******************
検索結果で固定ページ除外
******************/
function SearchFilter($query) {
if (!is_admin() && $query->is_search()) {
$query->set('post_type', 'post');
}
return $query;
}
add_action( 'pre_get_posts','SearchFilter' );


/******************
robots.txt 編集
******************/
function custom_robots_txt($output) {
  $public = get_option( 'blog_public' );
  $site_url = parse_url( site_url() );
  $path = ( !empty( $site_url['path'] ) ) ? $site_url['path'] : '';
  if ( '0' != $public ) {
    $output .= "Disallow: $path/wp-includes/n";
    $output .= "Disallow: $path/wp-content/themes/n";
    $output .= "Disallow: $path/wp-content/plugins/n";
  }
  return $output;
  }
  add_filter('robots_txt', 'custom_robots_txt');


/******************
wp_head・wp_footerにコード追加
******************/
//wp_headに追加
function adds_head() {
  echo '<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>'."\n";
  }
  add_action('wp_head', 'adds_head', 5);
