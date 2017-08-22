<?php
//++++++++++++++++++++++++++++++++++++++++++++++++
//管理画面整理

add_theme_support( 'post-thumbnails' );

function remove_menus () {
global $menu;
     $restricted = array(__('ダッシュボード'), __('投稿'), __('メディア'), __('リンク'), __('コメント'));
     end ($menu);
     while (prev($menu)){
          $value = explode(' ',$menu[key($menu)][0]);
          if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
     }
}
/*add_action('admin_menu', 'remove_menus'); //投稿を出すか隠すか*/
//++++++++++++++++++++++++++++++++++++++++++++++++
//カスタムポスト

//ニュースリリース
/*function news_custom_post_type()
{
$labels = array(
'name' => _x('ニュースリリース', 'post type general name'),
'singular_name' => _x('ニュースリリース', 'post type singular name'),
'add_new' => _x('ニュースリリースを追加', 'news'),
'add_new_item' => __('新しいニュースリリースを追加'),
'edit_item' => __('ニュースリリースを編集'),
'new_item' => __('新しいニュースリリース'),
'view_item' => __('ニュースリリースを編集'),
'search_items' => __('ニュースリリースを探す'),
'not_found' => __('ニュースリリースはありません'),
'not_found_in_trash' => __('ゴミ箱にニュースリリースはありません'),
'parent_item_colon' => ''
);
$args = array(
'labels' => $labels,
'public' => true,
'publicly_queryable' => true,
'show_ui' => true,
'query_var' => true,
'rewrite' => true,
'capability_type' => 'post',
'hierarchical' => false,
'menu_position' => 5,
'has_archive' => true,
'supports' => array('title','editor','custom-fields','thumbnail','author','excerpt','trackbacks','comments','revisions','page-attributes','post-formats'),
'taxonomies' => array('newscat','newstag')
);
register_post_type('news',$args);
// カスタムタクソノミーを作成
//カテゴリータイプ
$args = array(
'label' => 'カテゴリー',
'public' => true,
'show_ui' => true,
'hierarchical' => true
);
register_taxonomy('newscat','news',$args);
//タグタイプ
$args = array(
'label' => 'タグ',
'public' => true,
'show_ui' => true,
'hierarchical' => false
);
register_taxonomy('newstag','news',$args);
}
add_action('init', 'news_custom_post_type');

//カテゴリ表示
function add_custom_news( $defaults ) {
$defaults['newscat'] = 'カテゴリー';
return $defaults;
}
add_filter('manage_news_posts_news', 'add_custom_news');
function add_custom_news_id($news_name, $id) {
if( $news_name == 'newscat' ) {
echo get_the_term_list($id, 'newscat', '', ', ');
}
}
add_action('manage_news_posts_custom_news', 'add_custom_news_id', 10, 2);*/

//++++++++++++++++++++++++++++++++++++++++++++++++
// Adminbar非表示
add_filter( 'show_admin_bar', '__return_false' );
//サイドバーウィジェット
register_sidebar(array(
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
// 投稿記事一覧にアイキャッチ画像を表示
function manage_posts_columns($columns) {
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
}
function add_column($column_name, $post_id) {
    if ( 'thumbnail' == $column_name) {
        $thum = get_the_post_thumbnail($post_id, array(75,75), 'thumbnail');
    }
    if ( isset($thum) && $thum ) {
        echo $thum;
    } else {
        echo __('None');
    }
}
add_filter( 'manage_posts_columns', 'manage_posts_columns' );
add_action( 'manage_posts_custom_column', 'add_column', 10, 2 );

//投稿一覧で表示される記事数を変更する。
function my_edit_posts_per_page($posts_per_page) {
   return 50; // ここの数字を表示したい記事数に変更してください。
}
add_filter('edit_posts_per_page', 'my_edit_posts_per_page');

// This theme uses post thumbnails
/*	add_theme_support( 'post-thumbnails' );
	add_image_size( 'info_thumbnail', 282, 164, true );
  add_image_size( 'works_top_thumbnail', 260, 220, true );
  add_image_size( 'works_thumbnail', 300, 200, true );
	add_image_size( 'columnthumbnail', 250, 147, true );
	add_image_size( 'cover_thumbnail', 460, 560, true );
	add_image_size( 'list_thumbnail', 160, 100, true );*/

/*// 文字数制限
function new_excerpt_length($length) {	
	return 160;	
}	
add_filter( 'excerpt_length', 'new_excerpt_length');
// [...]トリ
function new_excerpt_more($more) {
	return ''; 
}
add_filter('excerpt_more', 'new_excerpt_more');
*/

?>