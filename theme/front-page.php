<?php get_header(); ?>
<style>
.layoutTyp03 .columnBox {
  width: 816px !important;
  margin: 0 auto !important;
  padding: 50px 0 0 !important;
  display: flex !important;
  justify-content: space-between !important;
  flex-wrap: wrap !important;
}
.layoutTyp03 .columnBox .column {
  width: 388px !important;
  height: 135px !important;
  margin: 0 0 40px !important;
  text-align: center !important;
}
.layoutTyp03 .columnBox .column:hover { opacity: 0.8; }
.layoutTyp03 .columnBox .column a {
  display: block;
  width: 100%;
  height: 100%;
  border: 1px solid #C7C7BB;
  border-radius: 8px;
  box-sizing: border-box;
  box-shadow: 3px 3px 6px 3px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
}
.layoutTyp03 .columnBox .column a:hover { text-decoration: none; border: 1px solid #00ABD3; }
.layoutTyp03 .columnBox .column h4 { padding: 32px 0 0; transition: all 0.3s ease; }
.layoutTyp03 .columnBox .column a:hover h4 { color: #00ABD3; }
.layoutTyp03 .columnBox .column p { padding: 15px 0 0; font-size: 1.4rem; font-weight: 500; line-height: 1.6; }
@media (max-width: 767px) {
  .layoutTyp03 .columnBox { width: 100%; padding: 40px 0 0; }
  .layoutTyp03 .columnBox .column { width: 100%; height: 100px; margin: 0 0 25px; }
  .layoutTyp03 .columnBox .column h4 { padding: 20px 0 0; font-size: 1.6rem; }
  .layoutTyp03 .columnBox .column p { padding: 10px 0 0; font-size: 1.2rem; }
}
</style>

<div id="topMv">
  <div class="videoArea">
    <video muted loop autoplay playsinline>
    <source src='<?php echo do_shortcode('[themePass]'); ?>/common/movie/tcd_pc.mp4' type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
    <p>動画を再生するには、videoタグをサポートしたブラウザが必要です。</p>
    </video>
  </div>
  
  <div class="videoArea_Sp">
    <video muted loop autoplay playsinline>
    <source src='<?php echo do_shortcode('[themePass]'); ?>/common/movie/tcd_mobile.mp4' type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
    <p>動画を再生するには、videoタグをサポートしたブラウザが必要です。</p>
    </video>
  </div>
</div>




<div id="mainContents" class="pt_0">
  <article class="pt_0">
    
    <section class="w_full pt_130">
      <div class="layoutTyp03">
        <h2 class="h-label">TCDのブランディングサービス</h2>
        <h3 class="h-display">Branding Services</h3>
        
        <div style=”width:816px;margin:0 auto;padding:50px 0 0;display:flex;justify-content:space-between;flex-wrap:wrap;”>

          <div style=”width:388px;height:135px;margin:0 0 40px;text-align:center;”>
            <a href=”/service/corporate_branding” style=”display:block;width:100%;height:100%;border:1px solid #C7C7BB;border-radius:8px;box-sizing:border-box;box-shadow:3px 3px 6px 3px rgba(0,0,0,0.1);transition:all 0.3s ease;text-decoration:none;”>
              <h4 class=”h-section” style=”padding:32px 0 0;”>企業ブランディング</h4>
              <p style=”padding:10px 0 0;font-size:1.4rem;font-weight:500;line-height:1.6;”>経営理念を軸に、企業の”らしさ”を再発見</p>
            </a>
          </div>

          <div style=”width:388px;height:135px;margin:0 0 40px;text-align:center;”>
            <a href=”/service/development” style=”display:block;width:100%;height:100%;border:1px solid #C7C7BB;border-radius:8px;box-sizing:border-box;box-shadow:3px 3px 6px 3px rgba(0,0,0,0.1);transition:all 0.3s ease;text-decoration:none;”>
              <h4 class=”h-section” style=”padding:32px 0 0;”>商品開発・商品ブランディング</h4>
              <p style=”padding:10px 0 0;font-size:1.4rem;font-weight:500;line-height:1.6;”>コンセプト立案から商品デザインまで</p>
            </a>
          </div>

          <div style=”width:388px;height:135px;margin:0 0 40px;text-align:center;”>
            <a href=”/service/innerbranding” style=”display:block;width:100%;height:100%;border:1px solid #C7C7BB;border-radius:8px;box-sizing:border-box;box-shadow:3px 3px 6px 3px rgba(0,0,0,0.1);transition:all 0.3s ease;text-decoration:none;”>
              <h4 class=”h-section” style=”padding:32px 0 0;”>インナーブランディング支援</h4>
              <p style=”padding:10px 0 0;font-size:1.4rem;font-weight:500;line-height:1.6;”>共感と行動を生み出す文化づくりを支援</p>
            </a>
          </div>

          <div style=”width:388px;height:135px;margin:0 0 40px;text-align:center;”>
            <a href=”/service/naming” style=”display:block;width:100%;height:100%;border:1px solid #C7C7BB;border-radius:8px;box-sizing:border-box;box-shadow:3px 3px 6px 3px rgba(0,0,0,0.1);transition:all 0.3s ease;text-decoration:none;”>
              <h4 class=”h-section” style=”padding:32px 0 0;”>ネーミング開発</h4>
              <p style=”padding:10px 0 0;font-size:1.4rem;font-weight:500;line-height:1.6;”>あらゆるネーミング開発に対応</p>
            </a>
          </div>

          <div style=”width:388px;height:135px;margin:0 0 40px;text-align:center;”>
            <a href=”/service/product_branding” style=”display:block;width:100%;height:100%;border:1px solid #C7C7BB;border-radius:8px;box-sizing:border-box;box-shadow:3px 3px 6px 3px rgba(0,0,0,0.1);transition:all 0.3s ease;text-decoration:none;”>
              <h4 class=”h-section” style=”padding:32px 0 0;”>パッケージデザイン開発</h4>
              <p style=”padding:10px 0 0;font-size:1.4rem;font-weight:500;line-height:1.6;”>消費者の心を動かす店頭体験を演出</p>
            </a>
          </div>

          <div style=”width:388px;height:135px;margin:0 0 40px;text-align:center;”>
            <a href=”/service/new_business” style=”display:block;width:100%;height:100%;border:1px solid #C7C7BB;border-radius:8px;box-sizing:border-box;box-shadow:3px 3px 6px 3px rgba(0,0,0,0.1);transition:all 0.3s ease;text-decoration:none;”>
              <h4 class=”h-section” style=”padding:32px 0 0;”>新事業・スタートアップ支援</h4>
              <p style=”padding:10px 0 0;font-size:1.4rem;font-weight:500;line-height:1.6;”>新たな事業やサービスの成功をサポート</p>
            </a>
          </div>

        </div><br><br><br><br><br><br>
      </div>
    </section>


        
        <section class="w_full bc_G03 pb_130">
          <div class="layoutTyp02">
            <h2 class="h-hero">経営に、デザインの力を。</h2>
            <p>50年の実績を支える「デザイン力」<br />
              100業種を超える経験で培った「仮説構築力」<br />
            スピーディに視覚化し、検証を行う「実行力」</p>
            
            <p>課題の本質を捉え、デザインの力で経営課題を解決する。<br />
              TCDは、経営パートナーとして伴走しながら<br />
            企業が進むべき未来を描いていきます。</p>
          </div>
        </section>


    
    <div id="mainContents" class="pt_0">
      <article class="pt_0">
        
        <section class="w_full pb_130">
          <div class="layoutTyp01">
            <h1 class="h-display">TOTAL CULTURAL DYNAMISM</h1>
            <p>すべての活動が文化的でダイナミックに進められる集団 TCD</p>
            <p>銀座文化、芦屋文化に育まれ<br />
              革新にひるまず、未来を拓く。<br />
            伝統をつくり、未来に活かす。</p>
            
            <p>私たちは豊かなアイデアで<br />
              人に共感や感動を届け<br />
              文化的満足にあふれた社会を<br />
            目指しています。</p>
          </div>
        </section>
        


    <section class="w_full pt_130">
      <div class="layoutTyp04">
        <h2 class="h-label">ブランディング実績</h2>
        <h3 class="h-display">Branding <br class="spView" />Works</h3>
        
        <div class="layoutTyp04_Inner">
        
          <div class="column">
            <a href="/works/corporate/nitto.html">
              <img src="/wp-content/uploads/2022/08/nitto_thum.jpg" alt="" />
              <h4 class="h-label">日東電工株式会社 [大阪]</h4>
              <p>創業100周年へ向けた新たな挑戦、ニットーのブランディング</p>
            </a>
          </div>

          <div class="column">
            <a href="/works/product/kakitane.html">
              <img src="/wp-content/uploads/2022/06/kakitane_thumb-1.jpg" alt="" />
              <h4 class="h-label">とよす株式会社 [大阪]</h4>
              <p>日本初・柿の種専門店、かきたねキッチンのブランディング</p>
            </a>
          </div>

          <div class="column">
            <a href="/works/corporate/nobori_ltd.html">
              <img src="/wp-content/uploads/2022/08/nobori_thum.jpg" alt="" />
              <h4 class="h-label">PSP株式会社 [東京]</h4>
              <p>医療情報共有サービス「NOBORI（ノボリ）」のブランディング</p>
            </a>
          </div>

        </div>

      </div>
    </section>


    <section class="w_full pt_130 pb_100">
      <div class="layoutTyp06">
        <h2 class="h-label">ブランディングコラム</h2>
        <h3 class="h-display">Branding Magazine</h3>

        <div class="layoutTyp06_Inner">

          <?php
          $args = array(
            'post_type' => 'branding',
            'posts_per_page' => 6
          );

          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
           while ($the_query->have_posts()) : $the_query->the_post();
          ?>
          <div class="column">
            <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
              <p><?php the_title(); ?></p>
            </a>
          </div>
          <?php
          endwhile;
          endif;
          wp_reset_postdata();
          ?>

        </div>

        <div class="linkTyp01">
          <a href="/branding">一覧を見る</a>
        </div>
      </div>

    </section>


    <section id="p07" class="w_full pb_100">
      <div class="layoutTyp10">
        <h2 class="h-label">東京・大阪を中心に全国対応可能です</h2>
        <h3 class="h-display">Access</h3>

        <div class="layoutTyp10_Inner">

          <div class="column">
            <h4 class="h-section">東京支社</h4>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.400521643831!2d139.7630697757871!3d35.66713877259182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bdd84261e5f%3A0x4f8bc30f34032f62!2z44CSMTA0LTAwNjEg5p2x5Lqs6YO95Lit5aSu5Yy66YqA5bqn77yX5LiB55uu77yR77yW4oiS77yS77yR!5e0!3m2!1sja!2sjp!4v1719191157399!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <h2 class="h-card">東京を中心とした東日本エリアの窓口</h2>
            <p>東京都中央区銀座7-16-21　銀座木挽ビル7F<br>
            Tel：03-6263-8330</p>
          </div>

          <div class="column">
            <h4 class="h-section">芦屋本社</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3278.8584186594935!2d135.31448331563135!3d34.73396298042598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000f2dd0e04607b%3A0x9a844ac1fb2afdbe!2z77yI5qCq77yJ77y077yj77yk!5e0!3m2!1sja!2sjp!4v1613371111372!5m2!1sja!2sjp" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <h2 class="h-card">大阪・兵庫を中心とした西日本エリアの窓口</h2>
            <p>兵庫県芦屋市春日町7-19　TCDビル<br>
            Tel：0797-34-4300</p>
          </div>

        </div>
      </div>
    </section>


  </article>
</div>

<link rel="stylesheet" href="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/slider/jquery.bxslider.css" />
<script type="text/javascript" src="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/slider/jquery.bxslider.min.js"></script>
<script>
$(function(){
  $(window).load(function(){
    var winW = $(window).width();
    //スライド
    $(".layoutTyp03_Mv").animate({ opacity: 1 }, { duration: 500, easing: 'linear' });
    if(winW > 767){
      $(".layoutTyp03_Mv").bxSlider({
        auto: true,
        speed: 1000,
        pause: 4000,
        slideMargin: 25,
        controls: false,
        pager: true
      });
    } else {
      $(".layoutTyp03_Mv").bxSlider({
        auto: true,
        speed: 1000,
        pause: 4000,
        controls: false,
        pager: true
      });
    }
  });
});
</script>


<?php get_footer(); ?>
