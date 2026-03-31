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

  register_post_type('recruit', array(
    'label'              => 'Recruit',
    'public'             => true,
    'has_archive'        => true,
    'hierarchical'       => true,
    'rewrite'            => array('slug' => 'recruit', 'with_front' => false),
    'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes'),
    'show_ui'            => true,
    'show_in_nav_menus'  => true,
    'show_in_rest'       => true,
    'menu_position'      => 8,
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
  if ($query->is_post_type_archive('recruit')) {
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
  if (get_option('tcd_flush_rewrite_done') !== '2') {
    flush_rewrite_rules();
    update_option('tcd_flush_rewrite_done', '2');
  }
});


// =============================================================================
// CSS読み込み (wp_enqueue_style)
// =============================================================================
function tcd_enqueue_styles() {
    $uri = get_template_directory_uri();
    $ver = '2.4';

    wp_enqueue_style('tcd-basis',          $uri . '/assets/css/vendor/basis.min.css',   array(),             $ver);
    wp_enqueue_style('tcd-drawer',         $uri . '/assets/css/vendor/drawer.css',       array(),             $ver);
    wp_enqueue_style('tcd-slick',          $uri . '/assets/css/vendor/slick.css',        array(),             $ver);
    wp_enqueue_style('tcd-slick-theme',    $uri . '/assets/css/vendor/slick-theme.css',  array('tcd-slick'),  $ver);
    wp_enqueue_style('tcd-base',           $uri . '/common/css/base.css',                array('tcd-basis'),  $ver);
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

// =============================================================================
// Recruit投稿タイプ 記事一括作成（一回限り実行）
// 実行後は get_option('tcd_recruit_posts_created') が '1' になり再実行されない
// =============================================================================
add_action('init', function() {
  if (get_option('tcd_recruit_posts_created') === '1') return;

  $posts = array(
    array(
      'post_title'   => 'キャリア採用',
      'post_name'    => 'career',
      'post_date'    => '2026-03-23 09:00:00',
      'post_content' => '<div><img loading="lazy" src="/wp-content/uploads/2017/09/recruite.jpg" alt="" width="750" height="450" /></div>

<p>創業50年、ブランドで未来を創るパートナー<br /><br />
TCDは、ブランドの力で企業や商品の価値を最大化し続けてきました。パッケージデザイン、広告、ウェブデザインといった表層的なデザインだけでなく、経営戦略や事業戦略といったビジネスの根幹からクライアントを支え、課題を解決するブランディングのプロフェッショナル集団です。<br />
<br />
老舗企業からベンチャー、BtoBからBtoC、素材メーカー、日用品メーカー、ITサービス事業など、私たちは幅広い業界・業種の課題に向き合い、新たな価値創造をクライアントと共に実現してきました。<br />
これからも、ブランドを通じて未来を切り拓くために、私たちと一緒に挑戦してくれる仲間を募集しています。TCDの理念に共感し、ともにブランドの価値を創り上げたいという思いのある方は、ぜひ応募をご検討ください。<br />
<br />
現在、以下の職種で採用を行っています。<br />
ご応募については各ページの募集要項をご確認いただき、<a href="https://www.tcd.jp/recruit/career_entry">採用専用フォーム</a>よりエントリーください。</p>

<hr />

<p>
<a href="/recruit/career_copy.html"><strong>＞ 【芦屋本社】コピーライター</strong></a><br /><br />
<a href="/recruit/career_hq_designer.html"><strong>＞ 【東京オフィス】グラフィックデザイナー／デザインディレクター</strong></a>
</p>',
    ),
    array(
      'post_title'   => '新卒採用',
      'post_name'    => 'new_outline',
      'post_date'    => '2026-03-23 09:01:00',
      'post_content' => '<h2>【2027年新卒採用】東京　デザイナー職／アカウント・プランナー職</h2>

<p>株式会社TCDは、「経営に、デザインの力を。」をコンセプトに、企業様のブランディング支援・デザイン支援をトータルで手がける会社です。さまざまなブランディングに、アカウント・プランナー、デザイナーとして関わりたいという意欲のある方のご参加をお待ちしています。</p>

<dl class="profile">
<dt>採用予定数</dt><dd>若干名</dd>
<dt>職種</dt><dd>・デザイナー職（東京支社）<br />・アカウント・プランナー職（東京支社）</dd>
<dt>資格</dt><dd>2027年3月末までに国内外の大学院、大学、高等専門学校（専攻科）を卒業・修了見込みの方。または既に卒業・修了された方（第二新卒を含む）</dd>
<dt>初任給</dt><dd>月額260,000円（年俸3,120,000円）<br />※みなし残業代月32時間分を含む</dd>
<dt>勤務時間</dt><dd>裁量労働制／基本時間（9時00分〜18時00分）</dd>
<dt>諸手当</dt><dd>年俸に含む</dd>
<dt>勤務地</dt><dd>東京支社</dd>
<dt>交通費</dt><dd>月上限22,000円まで</dd>
<dt>賞与</dt><dd>年2回（7月・12月）</dd>
<dt>昇給</dt><dd>能力評価により決定</dd>
<dt>休日</dt><dd>年間休日平均128日<br />完全週休2日制／年末年始休暇・夏季休暇／会社指定の特別休業日（年2〜3日）／有給休暇制度あり</dd>
<dt>福利厚生等</dt><dd>各種社会保険完備・退職金制度・育児休暇制度他</dd>
<dt>必要書類</dt><dd>・履歴書（写真貼付）<br />・ポートフォリオ（デザイナー職を希望される方のみ）<br />【下記は後日提出】<br />・成績証明書<br />・卒業見込証明書<br />・健康診断書</dd>
<dt>選考の流れ</dt><dd>・エントリー開始：3/1（日）<br />・会社説明会（オンライン）：3/13（金）・3/27（金）<br />・エントリー締切：4/13（月）<br />・書類応募締切：4/15（水）17時まで<br />・1次面接（オンラインまたは対面）：4/27（月）〜<br />・2次面接（対面）：5/25（月）〜<br />・役員面接（対面・最終）：6/15（月）〜<br />・最終結果通知：6/26（金）予定<br /><br />※日時の詳細は、選考を通過された方に別途通知いたします<br />※上記予定は変更になる場合がございます</dd>
<dt>会社説明会</dt><dd>オンラインで開催いたします。ご参加をご希望の方はWantedlyよりエントリーください。<br /><br />＞<a href="https://www.wantedly.com/projects/2040482">27卒・ブランディング会社のプランナーが事例と働き方をご紹介！①</a><br />3月13日（金）17:00〜18:00<br /><br />＞<a href="https://www.wantedly.com/projects/2357809">27卒・ブランディング会社のデザイナーが事例と働き方をご紹介！②</a><br />3月27日（金）17:00〜18:00<br /><br />＞<a href="https://www.wantedly.com/projects/2357815">27卒・ブランディング会社のデザイナーが事例と働き方をご紹介！③</a><br />4月8日（水）17:00〜18:00<br /><br />※説明会へのご参加は任意であり、選考には影響いたしません。</dd>
<dt>会社見学会</dt><dd>実際に社内をご覧いただけます。ご参加をご希望の方はWantedlyよりエントリーください。<br /><br />＞<a href="https://www.wantedly.com/projects/2357818">27卒学生の方向けのオフィスツアー＆社員交流会①</a><br />3月19日（木）13:30〜<br /><br />＞<a href="https://www.wantedly.com/projects/2357826">27卒学生の方向けのオフィスツアー＆社員交流会②</a><br />3月31日（火）13:30〜<br /><br />※見学会へのご参加は任意であり、選考には影響いたしません。</dd>
</dl>

<p class="btnlike"><a target="_blank" href="https://www.tcd.jp/recruit/recruit_entry" rel="noopener">エントリーフォームはこちら</a></p>',
    ),
    array(
      'post_title'   => '採用ポリシー',
      'post_name'    => 'policy',
      'post_date'    => '2026-03-23 09:02:00',
      'post_content' => '<p>採用に当たって私達は次の様な方と出会いたいと思っています。<br />
ともにブランディングの可能性を探求していける方のご応募をお待ちしています。</p>

<p class="sttl"><strong>1 美質を尊ぶ人</strong></p>
<p class="indentTxt">TCDの品質基準として特に大切にされているのが「美質」です。<br />
「それはうつくしいか？」と、物性的な品質基準と共に感性的な品質基準として常に私達の作品に問われています。<br />
表現が斬新であること、驚きがあることは言う迄もありませんが、その発想が知的でアイデアに溢れ、美質に富んでいることが何よりも尊ばれます。</p>

<p class="sttl"><strong>2 人の気持ちを測れる人</strong></p>
<p class="indentTxt">私達の職能として、クライアントの気持ち、その先にあるユーザーの気持ち、そして共に生きる仲間の気持ちを推し測る術が常に求められます。<br />
人の気持ちが解れば自分の気持ちも解ってもらえる。自信と誇りを持って接することの出来る人が優先されます。</p>

<p class="sttl"><strong>3 プロ意識の持てる人</strong></p>
<p class="indentTxt">スペシャリストとして確実に結果を出す。それはプロとしてのプライドです。プロには自らの能力が最大に引き出され、且つ有効に活用されるためにスペシャリストとしてのベストコンディションが求められます。プロとしての参加を期待します。</p>',
    ),
  );

  foreach ($posts as $data) {
    $existing = get_posts(array(
      'post_type'   => 'recruit',
      'name'        => $data['post_name'],
      'post_status' => 'publish',
      'numberposts' => 1,
    ));
    if ($existing) continue;

    wp_insert_post(array(
      'post_title'   => $data['post_title'],
      'post_name'    => $data['post_name'],
      'post_type'    => 'recruit',
      'post_status'  => 'publish',
      'post_date'    => $data['post_date'],
      'post_content' => $data['post_content'],
    ));
  }

  update_option('tcd_recruit_posts_created', '1');
});

?>
