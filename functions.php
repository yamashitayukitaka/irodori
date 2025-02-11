<?php 
function irodri_scripts(){
  wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/src/style.css', array(), '1.0.0' );
  wp_enqueue_script('jquery');
  /*wp_deregister_script('jquery');
  外部jQueryのcdnを読み込ませる。
  wp_enqueue_script(
  'jquery',
  'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js', 
  array(), 
  '3.7.1'
  );*/
  wp_enqueue_script('slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js', array('jquery'), '1.9.0', true);
  wp_enqueue_script(
  'irodori-common',
  get_template_directory_uri() .'/dist/js/main.js',
  array(),
  '1.0.0',
  true
  );
  if ( is_front_page() || is_post_type_archive( 'xo_event' )) {
    wp_enqueue_script(
      'irodori-top',
      get_template_directory_uri() .'/dist/js/event.js',
      array(),
      '1.0.0',
      true
    ); 
  } 
  if (is_page('exterior'))
  {
  wp_enqueue_script(
    'irodori-exterior',
    get_template_directory_uri() .'/dist/js/exterior.js',
    array(),
    '1.0.0',
    true
    );
  }elseif (is_page('flow'))
    {
    wp_enqueue_script(
      'irodori-flow',
      get_template_directory_uri() .'/dist/js/flow.js',
      array(),
      '1.0.0',
      true
    );
  }elseif(is_page('external'))
    {
    wp_enqueue_script(
      'irodori-external',
      get_template_directory_uri() .'/dist/js/exterior-detail.js',
      array(),
      '1.0.0',
      true
    );
  }elseif(is_page('regarden'))
    {
    wp_enqueue_script(
      'irodori-external',
      get_template_directory_uri() .'/dist/js/exterior-detail.js',
      array(),
      '1.0.0',
      true
    );
  }
  // defer属性を付与する
  wp_script_add_data('irodori-common', 'defer', true);
  wp_script_add_data('irodori-exterior', 'defer', true);
  wp_script_add_data('irodori-line-up', 'defer', true);
  wp_script_add_data('irodori-flow', 'defer', true);
  wp_script_add_data('irodori-external', 'defer', true);

  wp_enqueue_style( 'slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css', array(), '1.9.0' );
  wp_enqueue_style( 'slick-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css', array(), '1.9.0' );

}
add_action('wp_enqueue_scripts','irodri_scripts');




//カレンダーを英語表記にする
function my_event_calendar_month( $html, $args, $month_index, $events ) {
  
  if($html){
    $html = str_replace('<thead><tr><th class="sunday">日</th><th class="monday">月</th><th class="tuesday">火</th><th class="wednesday">水</th><th class="thursday">木</th><th class="friday">金</th><th class="saturday">土</th></tr></thead>','<thead><tr><th class="sunday">SUN</th><th class="monday">MON</th><th class="tuesday">TUE</th><th class="wednesday">WED</th><th class="thursday">THU</th><th class="friday">FRI</th><th class="saturday">SAT</th></tr></thead>',$html);
  }
 
  return $html;
}
add_filter( 'xo_event_calendar_month', 'my_event_calendar_month', 10, 4 );


//サムネイル有効化
function irodori_theme(){
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','irodori_theme');

//the_archive_titleで表示されるアーカイブという記述を削除
function remove_archive_prefix($title) {
  return preg_replace('/^アーカイブ: /', '', $title);
}
add_filter('get_the_archive_title', 'remove_archive_prefix');

//the_archive_titleで表示されるspanタグを削除
function remove_archive_span_tag($title) {
  return strip_tags($title); // タグを削除して返す
}
add_filter('get_the_archive_title', 'remove_archive_span_tag');

//search.phpで検索結果の表示のためのループはメインクエリ、メインループを使用するので、制御したい場合は、
//サブループを使用せずに、functions.phpでフィルターフックを使用する
//seach.phpの結果表示をカスタム投稿タイプblogに制限する
function custom_search_filter($query) {
  if ($query->is_search && !is_admin()) {
      $query->set('post_type', array('blog'));
  }
  return $query;
}
add_filter('pre_get_posts', 'custom_search_filter');


//seach.phpでページネーションが使用できるようにpagedを設定する。
//1ページの表示件数を3件に設定する
function custom_search_pagination($query) {
  if ($query->is_search && !is_admin()) {
      $query->set('posts_per_page', 5); // 1ページあたりの投稿数
      $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
  }
  return $query;
}
add_filter('pre_get_posts', 'custom_search_pagination');

//the_excerptで表示される文字数を20文字に設定
function custom_excerpt_length( $length ) {
  return 20; // 20文字に設定する場合
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//アドミンバーが表示されたときの余白を消す
if ( is_admin_bar_showing() ) {
    // Admin Barの余白を削除するスタイルをbody要素に追加
    add_action( 'wp_head', function() {
        echo '<style type="text/css">
            body {
                margin-top: -32px !important;
            }
        </style>';
    });
}

//自動出力されるｐタグを出力させない
function custom_remove_paragraph_from_content( $content ) {
  $content = preg_replace( '/<p>/', '', $content );
  $content = preg_replace( '/<\/p>/', '', $content );
  return $content;
}
add_filter( 'the_content', 'custom_remove_paragraph_from_content' );


/*
if(function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
      'page_title'    => '個別の入力欄',
      'menu_title'    => 'TOPの管理',
      'menu_slug'     => 'theme-top-setting',
      'capability'    => 'edit_posts',
      'redirect'      => false
  ));
}
*/







  

















