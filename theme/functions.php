<?php

function twentysixteen_body_classes( $classes ) {
    if ( get_background_image() ) {
        $classes[] = 'custom-background-image';
    }
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }
    if (is_page()) {
        $page = get_post(get_the_ID());
        $addclass = 'page-' . $page->ID;
        if ($page->post_parent) {
            $addclass = 'page-' . $page->ID;
        }
        array_push($classes,$addclass);
    }

    array_push($classes,'drawer','drawer--right');
    return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

// =============================================================================
// xmlrpc停止
// =============================================================================
function sar_block_xmlrpc_attacks( $methods ) {
    unset( $methods['pingback.ping'] );
    unset( $methods['pingback.extensions.getPingbacks'] );
    return $methods;
}
add_filter( 'xmlrpc_methods', 'sar_block_xmlrpc_attacks' );

function sar_remove_x_pingback_header( $headers ) {
    unset( $headers['X-Pingback'] );
    return $headers;
}
add_filter( 'wp_headers', 'sar_remove_x_pingback_header' );
// =============================================================================
// 不要なメタタグの削除
// =============================================================================
remove_action('wp_head','wp_generator');
remove_action('wp_head','index_rel_link');
remove_action('wp_head','parent_post_rel_link',10);
remove_action('wp_head','start_post_rel_link',10);
remove_action('wp_head','adjacent_posts_rel_link',10);
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
function disable_emoji() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );


// =============================================================================
// 時間設定
// =============================================================================
date_default_timezone_set('Asia/Tokyo');

// =============================================================================
// BODYにクラスを追加
// =============================================================================
function pagename_class($classes = '') {
    if (is_page()) {
        $page = get_post(get_the_ID());
        $classes[] = $page->post_name;
        if ($page->post_parent) {
            $classes[] = get_page_uri($page->post_parent) . '-child';
        }
    }else if(is_single()){
        $category = get_the_category();
        $classes[] = 'cat-'.$category[0]->category_nicename.'';
    }
    return $classes;
}
//add_filter('body_class', 'pagename_class');

// =============================================================================
// スラッグを返す/親のスラッグ
// =============================================================================
function get_slug(){
    $sname;
    if (is_page()) {
        $page = get_post(get_the_ID());
        $sname = $page->post_name;
    }
    return $sname;
}
function get_parent_slug(){
    $parentname;
    if (is_page()) {
        $page = get_post(get_the_ID());
        $parentname = $page->post_name;
        if ($page->post_parent) {
            $parentname = get_page_uri($page->post_parent);
        }
    }
    return $parentname;
}



// remove_filter('the_content', 'wpautop');
function is_parent_slug() {
    global $post;
    if ($post->post_parent) {
        $post_data = get_post($post->post_parent);
        return $post_data->post_name;
    }
}


// =============================================================================
// ビジュアルエディタ禁止
// =============================================================================
function remove_tiny_mce($r){
	$type = get_current_screen()->id;
	if($type == 'page') return false; // 固定ページ
	if($type == 'post') return false; // 投稿
	return $r;
}
add_filter('user_can_richedit','remove_tiny_mce');


// =============================================================================
// ショートコード
// =============================================================================
//親テーマ
add_shortcode('themePass', 'shortcode_gtdu');
function shortcode_gtdu() {
return get_template_directory_uri();
}

//TOPページ
add_shortcode('hurl', 'shortcode_hurl');
function shortcode_hurl() {
return home_url( '/' );
}



// =============================================================================
// カスタム投稿のアイキャッチを有効
// =============================================================================
add_theme_support( 'post-thumbnails' );

register_post_type(
'branding',
  array(
  // 'supports'に'thumbnail'を追記
  'supports' => array('title','editor','thumbnail')
  )
);

add_action('init', function() {
  register_post_type('service', array(
    'label'              => 'Services',
    'public'             => true,
    'has_archive'        => true,
    'rewrite'            => array('slug' => 'service', 'with_front' => false),
    'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
    'show_ui'            => true,
    'show_in_nav_menus'  => true,
    'show_in_rest'       => true,
    'menu_position'      => 6,
  ));

  register_post_type('about', array(
    'label'              => 'About',
    'public'             => true,
    'has_archive'        => true,
    'rewrite'            => array('slug' => 'about', 'with_front' => false),
    'supports'           => array('title', 'editor', 'thumbnail'),
    'show_ui'            => true,
    'show_in_nav_menus'  => true,
    'show_in_rest'       => true,
    'menu_position'      => 7,
  ));
});


// =============================================================================
// 表示数
// =============================================================================
function set_pre_get_posts($query) {
  if (is_admin() || !$query->is_main_query()) {
    return;
  }
  if ($query->is_post_type_archive('works')) {
    $query->set('posts_per_page', '30');
    return;
  }
  if ($query->is_tax('magazine_tag')) {
    $query->set('posts_per_page', '21');
    return;
  }
  if ($query->is_post_type_archive('branding')) {
    $query->set('posts_per_page', '21');
    return;
  }
	if ($query->is_tax('magazine_cate')) {
		$query->set('posts_per_page', '21');
		return;
	}
  if ($query->is_tax('case_cate')) {
    $query->set('posts_per_page', '30');
    return;
  }
  if ($query->is_post_type_archive('service')) {
    $query->set('posts_per_page', '30');
    return;
  }
  if ($query->is_post_type_archive('about')) {
    $query->set('posts_per_page', '30');
    return;
  }
}
add_action('pre_get_posts', 'set_pre_get_posts');



/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

    //表示テキスト
    $text_first   = "最初のページへ";
    $text_last    = "最後のページへ";

    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<div class="pagination"><span class="current pager">1</span></div>';
        return;
    }

    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

    if ( 1 !== $pages ) {
        //２ページ以上の時
        echo '<nav id="pagination">';
        echo '<ul>';
        if ( $paged > 1 ) {
            // 「前へ」 の表示
            echo '<li class="prev"><a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev"></a></li>';
        }
        for ( $i = 1; $i <= $pages; $i++ ) {

            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<li class="Active"><a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a></li>';
                } else {
                    echo '<li><a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a></li>';
                }
            }

        }
        if ( $paged < $pages ) {
            // 「次へ」 の表示
            echo '<li class="next"><a href="', get_pagenum_link( $paged + 1 ) ,'"></a></li>';
        }
        echo '</ul>';
        echo '<div class="flLink">';
        echo '<a href="', get_pagenum_link(1) ,'">', $text_first ,'</a>';
        echo '<a href="', get_pagenum_link( $pages ) ,'">', $text_last ,'</a>';
        echo '</div>';
        echo '</nav>';
    }
}

// =============================================================================
// MW WP FormからSalesforceデータ送信
// =============================================================================

//お問い合わせ
function my_do_shortcode_tag( $output, $tag, $attr ) {
	if ( 'mwform_formkey' == $tag
	 && isset( $attr['key'] ) && '11028' == $attr['key'] && $_SERVER['REQUEST_URI'] == '/contact_confirm'
	) {
		$output = str_replace(
			'<form method="post" action="" enctype="multipart/form-data">',
      '<form action="https://go.tcd.jp/l/998361/2024-04-03/21f2c" method="post">',
			$output
		);
	}
	return $output;
}
add_filter( 'do_shortcode_tag', 'my_do_shortcode_tag' ,10, 3 );


//資料請求お申し込み
function my_do_shortcode_tag_down( $output, $tag, $attr ) {
	if ( 'mwform_formkey' == $tag
	 && isset( $attr['key'] ) && '16329' == $attr['key'] && $_SERVER['REQUEST_URI'] == '/download_confirm'
	) {
		$output = str_replace(
			'<form method="post" action="" enctype="multipart/form-data">',
      '<form action="https://go.tcd.jp/l/998361/2025-12-12/38dwr" method="post">',
			$output
		);
	}
	return $output;
}
add_filter( 'do_shortcode_tag', 'my_do_shortcode_tag_down' ,10, 3 );

//資料請求お申し込み 必須処理
// add_filter( 'mwform_validation_mw-wp-form-16329', 'custom_validation_any_one_checkbox_required', 10, 2 );
// function custom_validation_any_one_checkbox_required( $validation, $data ) {

//     $fields = array(
//         'f_01_01',
//         'f_01_02',
//         'f_01_03',
//         'f_01_04',
//     );

//     $checked = false;

//     foreach ( $fields as $field ) {
//         if ( empty( $data[ $field ] ) ) {
//             continue;
//         }

//         // チェックボックスは配列で来ることが多い
//         if ( is_array( $data[ $field ] ) ) {
//             // 空要素を除外して残ればチェックあり
//             $vals = array_filter( $data[ $field ], function( $v ) {
//                 return (string) $v !== '';
//             });
//             if ( ! empty( $vals ) ) {
//                 $checked = true;
//                 break;
//             }
//         } else {
//             // 単一値で来る構成にも一応対応
//             if ( (string) $data[ $field ] !== '' ) {
//                 $checked = true;
//                 break;
//             }
//         }
//     }

//     if ( ! $checked ) {
//         // 代表フィールドにエラーを出す（表示位置を固定したい時に便利）
//         $validation->set_rule(
//             'f_01_04',
//             'required',
//             array( 'message' => 'いずれか1つ以上チェックしてください。' )
//         );
//     }
//     return $validation;
// }



// =============================================================================
// MW WP Form 送信時間
// =============================================================================
function contact_date( $value, $key, $insert_contact_data_id ) {
  if ( $key === 'contact_date' ) {
      return date( 'Y年n月j日G時i分' );
  }
  return $value;
}
add_filter( 'mwform_custom_mail_tag_mw-wp-form-11028', 'contact_date', 10, 3 );

function contact_date_down( $value, $key, $insert_contact_data_id ) {
  if ( $key === 'contact_date_down' ) {
      return date( 'Y年n月j日G時i分' );
  }
  return $value;
}
add_filter( 'mwform_custom_mail_tag_mw-wp-form-16329', 'contact_date_down', 10, 3 );

function contact_date_recruit01( $value, $key, $insert_contact_data_id ) {
  if ( $key === 'contact_date_recruit01' ) {
      return date( 'Y年n月j日G時i分' );
  }
  return $value;
}
add_filter( 'mwform_custom_mail_tag_mw-wp-form-11775', 'contact_date_recruit01', 10, 3 );


function contact_date_recruit02( $value, $key, $insert_contact_data_id ) {
  if ( $key === 'contact_date_recruit02' ) {
      return date( 'Y年n月j日G時i分' );
  }
  return $value;
}
add_filter( 'mwform_custom_mail_tag_mw-wp-form-11772', 'contact_date_recruit02', 10, 3 );



// =============================================================================
// API （JSON）ファイルでサムネイル追加
// =============================================================================
add_action('rest_api_init', 'customize_api_response');
function customize_api_response() {
  // アイキャッチ画像のレスポンスを追加する投稿タイプ
  $post_types = ['works', 'branding'];

  foreach ($post_types as $post_type) {
    register_rest_field(
      $post_type,
      'thumbnail',
      array(
        'get_callback'  => function ($post) {
          $thumbnail_id = get_post_thumbnail_id($post['id']);

          if ($thumbnail_id) {
            // アイキャッチが設定されていたらurl・width・heightを配列で返す
            $img = wp_get_attachment_image_src($thumbnail_id, 'large');

            return [
              'url' => $img[0],
              'width' => $img[1],
              'height' => $img[2]
            ];
          } else {
            // アイキャッチが設定されていなかったら空の配列を返す
            return [];
          }
        },
        'update_callback' => null,
        'schema'          => null,
      )
    );
  }
}


// =============================================================================
// パーマリンクからタクソノミー名を削除
// =============================================================================
function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy){
  return str_replace('/'.$taxonomy.'/', '/', $termlink);
}
add_filter('term_link', 'my_custom_post_type_permalinks_set',11,3);

//カスタムタクソノミーアーカイブ用のリライトルールを追加 ページ送り時もリライト
//★それぞれownersblogはカスタム投稿タイプ名、ownersblog-catはカスタムタクソノミー名を挿入

add_rewrite_rule('works/([^/]+)/?$', 'index.php?case_cate=$matches[1]', 'top');
add_rewrite_rule('works/([^/]+)/page/([0-9]+)/?$', 'index.php?case_cate=$matches[1]&paged=$matches[2]', 'top');

add_rewrite_rule('branding/([^/]+)/?$', 'index.php?magazine_tag=$matches[1]', 'top');
add_rewrite_rule('branding/([^/]+)/page/([0-9]+)/?$', 'index.php?magazine_tag=$matches[1]&paged=$matches[2]', 'top');

// service/about 投稿タイプ登録後の一回限りリライトルール更新
add_action('init', function() {
  if (get_option('tcd_flush_rewrite_done') !== '1') {
    flush_rewrite_rules();
    update_option('tcd_flush_rewrite_done', '1');
  }
});


// =============================================================================
// CSS読み込み (wp_enqueue_style)
// =============================================================================
function tcd_enqueue_styles() {
    $uri = get_template_directory_uri();
    $ver = '2.1';

    wp_enqueue_style('tcd-basis',       $uri . '/assets/css/vendor/basis.min.css',   array(),            $ver);
    wp_enqueue_style('tcd-drawer',      $uri . '/assets/css/vendor/drawer.css',       array(),            $ver);
    wp_enqueue_style('tcd-slick',       $uri . '/assets/css/vendor/slick.css',        array(),            $ver);
    wp_enqueue_style('tcd-slick-theme', $uri . '/assets/css/vendor/slick-theme.css',  array('tcd-slick'), $ver);
    wp_enqueue_style('tcd-reset',       $uri . '/assets/css/reset.css',              array('tcd-basis'), $ver);
    wp_enqueue_style('tcd-base',        $uri . '/common/css/base.css',               array('tcd-reset'), $ver);
    wp_enqueue_style('tcd-site',        $uri . '/assets/css/site.css',               array('tcd-base'),  $ver);
}
add_action('wp_enqueue_scripts', 'tcd_enqueue_styles');


// =============================================================================
// タグを有効
// =============================================================================
// add_action( 'init', function () {
//     register_taxonomy( 'post_tag', [ 'post', 'branding' ],
//         [
//             'hierarchical' => false,
//             'query_var'    => 'tag',
//         ]
//     );
// });
// add_action('pre_get_posts', function ($query){
//     if ( is_admin() && ! $query->is_main_query() ) {
//         return;
//     }
//     if ( $query->is_category() || $query->is_tag() ) {
//         $query->set('post_type', ['post','branding']);
//     }
// });
//
// function add_tag_post_column_title( $columns ) {f
//     $columns[ 'slug' ] = "ブランディング";
//     return $columns;
// }
// function add_tag_post_column( $column_name, $post_id ) {
//     if( $column_name == 'slug' ) {
//         $tags = get_the_tags();
//         if($tags){
//             foreach ( $tags as $tag ) {
//                 echo $tag->name .' ';
//             }
//         }
//     }
// }
// add_filter( 'manage_branding_posts_columns', 'add_tag_post_column_title' );
// add_action( 'manage_branding_posts_custom_column', 'add_tag_post_column', 10, 2 );

// =============================================================================
// ACF: Service投稿 - 関連Worksカテゴリーフィールド
// =============================================================================
add_action('acf/init', function() {
  if (!function_exists('acf_add_local_field_group')) return;

  acf_add_local_field_group(array(
    'key'    => 'group_service_related_works',
    'title'  => '関連Works設定',
    'fields' => array(
      array(
        'key'           => 'field_related_works_cate',
        'label'         => '関連Worksカテゴリー',
        'name'          => 'related_works_cate',
        'type'          => 'taxonomy',
        'taxonomy'      => 'case_cate',
        'field_type'    => 'select',
        'allow_null'    => 1,
        'return_format' => 'object',
        'instructions'  => 'このServiceページに表示するWorksのカテゴリーを選択',
      ),
    ),
    'location' => array(array(array(
      'param'    => 'post_type',
      'operator' => '==',
      'value'    => 'service',
    ))),
    'position' => 'side',
  ));
});
?>
