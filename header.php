<?php
    global $sUrl,$tDir;
    $sUrl=get_bloginfo('siteurl').'/';
    $tDir=get_bloginfo('template_directory').'/';
?>

<?php
//body ID分岐
if ( is_front_page()) { $bodyId = "top"; }
else{ $bodyId = ""; }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0" />

<?php
ob_start();
 wp_head();
 $wp_head_contents = ob_get_clean();
 $wp_head_contents = str_replace('http://', 'https://', $wp_head_contents);
 echo($wp_head_contents);
?>

<meta name="author" content="株式会社TCD">

<script type="text/javascript" src="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo do_shortcode('[themePass]'); ?>/common/js/common.js"></script>

<!-- href属性にファビコンファイルのURIを記述 -->
<link rel="apple-touch-icon" type="image/png" href="<?php echo do_shortcode('[themePass]'); ?>/common/img/apple-touch-icon.png">
<link rel="icon" type="image/png" href="<?php echo do_shortcode('[themePass]'); ?>/common/img/icon.png">

<!-- ここからOGP -->
<meta property="og:type" content="company">
<?php
    if (is_single()){//単一記事ページの場合
        if(have_posts()): while(have_posts()): the_post();
        echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'">';echo "\n";//抜粋を表示
        endwhile; endif;
        echo '<meta property="og:title" content="'; the_title(); echo '">';echo "\n";//単一記事タイトルを表示
        echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";//単一記事URLを表示
    } else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
        echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログの説明文を表示
        echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログのタイトルを表示
        echo '<meta property="og:url" content="'; bloginfo('url'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログのURLを表示
    }
        ?>
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
        <?php
    $str = $post->post_content;
    $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる
    if (is_single()){//単一記事ページの場合
        if (has_post_thumbnail()){//投稿にサムネイルがある場合の処理
            $image_id = get_post_thumbnail_id();
            $image = wp_get_attachment_image_src( $image_id, 'full');
            echo '<meta property="og:image" content="'.$sUrl.$image[0].'">';echo "\n";
        } else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {//投稿にサムネイルは無いが画像がある場合の処理
            echo '<meta property="og:image" content="'.$sUrl.$imgurl[2].'">';echo "\n";
        } else {//投稿にサムネイルも画像も無い場合の処理
            echo '<meta property="og:image" content="'.$sUrl.'ogp.png.">';echo "\n";
        }
    }else if(is_page()){
        if (has_post_thumbnail()){//投稿にサムネイルがある場合の処理
            $image_id = get_post_thumbnail_id();
            $image = wp_get_attachment_image_src( $image_id, 'full');
            echo '<meta property="og:image" content="'.$sUrl.$image[0].'">';echo "\n";
        } else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {//投稿にサムネイルは無いが画像がある場合の処理
            echo '<meta property="og:image" content="'.$sUrl.$imgurl[2].'">';echo "\n";
        } else {//投稿にサムネイルも画像も無い場合の処理
            echo '<meta property="og:image" content="'.$sUrl.'ogp.png">';echo "\n";
        }
    } else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
        echo '<meta property="og:image" content="'.$sUrl.'ogp.png">';echo "\n";
    }
?>
<!-- ここまでOGP -->

<script type="application/ld+json">
  {
    "@context": "http://schema.org/",
    "@type": "Organization",
    "url": "https://www.tcd.jp/",
    "headline":"東京・大阪で50年のブランディング実績。TCDのブランディングサービスをご紹介します。",
        "description":"デザインの力で「ブランドの価値」実装する、株式会社TCD。東京・大阪で50年の実績を有するブランディング会社。企業ブランディング、商品ブランディング、サービスブランディングの戦略立案からデザインまでトータルにサポートします。"
  }
</script>

<title><?php
//タイトルタグを任意に表示
if(get_field("meta_title")){
  the_field('meta_title');
} 
//任意がなければ下記
else {
  if(is_home()){
    echo 'ブランディング会社｜東京・大阪｜株式会社TCD';
  } elseif (is_tax("case_cate","top")) {
    echo 'ブランディング事例｜株式会社TCD';
  } else {
    wp_title('|', true, 'right');
    echo '株式会社TCD';
  }
}
?></title>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-755183-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-755183-1');
</script>
<!--GA4 Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZB62QGFTVX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZB62QGFTVX');
  gtag('config', 'AW-1026905651');
</script>

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '244904051893681');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=244904051893681&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<?php if(is_page('contact_end')){ ?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1026905651"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-1026905651');
</script>

<!-- Event snippet for 20240415_新お問い合わせCVタグ conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-1026905651/v9noCNCC46YZELOs1ekD'});
</script>
<?php } ?>

</head>

<body>
  <div id="tcd">

  <!-- ▼HEADER▼ -->
  <header>

    <div id="header">

      <div id="headerLogoArea">
        <a href="/">
          <img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/tcd_logo.svg" alt="TCD" id="logoImg" class="pcView" />
          <img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/tcd_logo_sp.svg" alt="TCD" class="spView" />
        </a>
      </div>

      <div id="headerGlobalArea">
        <nav>
          <ul>
            <li<?php if (is_post_type_archive("works")){ print(' class="active"'); } if (is_tax("case_cate")){ print(' class="active"'); } if (is_singular("works")){ print(' class="active"');  } ?>><a href="/works/">Works</a></li>
            <li<?php if (is_page(array('service', 'corporate_branding', 'product_branding', 'new_business', 'development', 'naming_s', 'product_design-html', 'brand_promotion', 'branding_s2'))){ print(' class="active"'); } ?>><a href="/service/">Services</a></li>
            <li<?php if (is_page("about")){ print(' class="active"'); } if (is_page("workingstyle")){ print(' class="active"'); } if (is_page("capability")){ print(' class="active"'); } ?>><a href="/about/">About</a></li>
            <li<?php if (is_post_type_archive("branding")){ print(' class="active"'); } if (is_tax("magazine_cate")){ print(' class="active"'); } if (is_tax("magazine_tag")){ print(' class="active"'); } if (is_singular("branding")){ print(' class="active"');  } ?>><a href="/branding/">Magazine</a></li>
            <li<?php if (is_page("desart")){ print(' class="active"');  } ?>><a href="https://desart.tcd.jp/" target="_blank">Art Business</a></li>
          </ul>
        </nav>
      </div>

      <div id="headerSubArea">
        <nav>
          <ul>
            <li><a href="/recruit/">採用情報</a></li>
            <li><a href="/english.html">English</a></li>
          </ul>
        </nav>
      </div>

      <div id="headerContactArea">
        <nav>
          <ul>
            <li><a href="/download">資料請求</a></li>
            <li><a href="/contact">お問い合わせ</a></li>
          </ul>
        </nav>
      </div>

    </div>

    <div id="header_SpIcon">
      <a class="menu-trigger" href="javascript:void(0);">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>


    <div id="header_SpMenu">
      <div id="header_SpScroll">
        <div id="header_SpLink">
          <nav>
            <ul>
              <li><a href="/">Top</a></li>
              <li><a href="/works/">Works</a></li>
              <li><a href="/service/">Services</a></li>
              <li><a href="/about/">About</a></li>
              <li><a href="/branding/">Magazine</a></li>
              <li><a href="https://desart.tcd.jp/" target="_blank">Art Business</a></li>
              <li><a href="/recruit/">Recruit</a></li>
              <li><a href="/english.html">English</a></li>
            </ul>
          </nav>
        </div>

        <div id="header_SpContact01">
          <a href="/download">
            <h3>資料請求</h3>
            <p>弊社の実績資料をダウンロードいただけます</p>
          </a>
        </div>

        <div id="header_SpContact02">
          <a href="/contact/">
            <h3>お問い合わせ</h3>
            <p>まずは、お気軽にご相談・お問い合わせください</p>
          </a>
        </div>

        <div id="header_SpSns">
          <ul>
            <li><a href="https://www.facebook.com/TCDcorporation" target="_blank"><img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/sns_icon01.svg" alt="" /></a></li>
            <li><a href="https://www.instagram.com/tcdcorporation/" target="_blank"><img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/sns_icon02.svg" alt="" /></a></li>
            <li><a href="/contact/"><img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/sns_icon03.svg" alt="" /></a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="scroll"></div>
  </header>
