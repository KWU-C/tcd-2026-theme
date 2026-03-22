</div>

<!-- ▼FOOTER▼ -->
<?php if(is_page(array('contact', 'contact_confirm', 'contact_end', 'download', 'download_confirm', 'download_end', 'career_entry', 'recruit_entry'))){} else{ ?>
<div id="footerContact">
  <div class="column">
    <a href="/download">
      <h3>資料請求</h3>
      <p>弊社の実績資料をダウンロードいただけます</p>
    </a>
  </div>

  <div class="column">
    <a href="/contact">
      <h3>お問い合わせ</h3>
      <p>まずは、お気軽にご相談・お問い合わせください</p>
    </a>
  </div>
</div>
<?php } ?>

<footer>
  <div id="footerBody">
    <h2>
      <a href="/">
        <img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/logo02_ov.svg" alt="tcd" />
        <img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/logo02.svg" alt="tcd" />
      </a>
    </h2>

    <div id="footerLink">
      <div class="column">
        <ul>
          <li><a href="/works/">Works</a></li>
          <?php
          $case_terms = get_terms(array('taxonomy' => 'case_cate', 'hide_empty' => false));
          foreach ($case_terms as $term) {
            echo '<li><a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a></li>';
          }
          ?>
        </ul>
      </div>

      <div class="column">
        <ul>
          <li><a href="/service/">Services</a></li>
          <?php
          $footer_service_posts = get_posts(array(
            'post_type'      => 'service',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
          ));
          foreach ($footer_service_posts as $p) {
            echo '<li><a href="' . get_permalink($p->ID) . '">' . esc_html($p->post_title) . '</a></li>';
          }
          ?>
        </ul>
      </div>

      <div class="column">
        <ul>
          <li><a href="/about/">About</a></li>
          <?php
          $footer_about_posts = get_posts(array(
            'post_type'      => 'about',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'ASC',
          ));
          foreach ($footer_about_posts as $p) {
            echo '<li><a href="' . get_permalink($p->ID) . '">' . esc_html($p->post_title) . '</a></li>';
          }
          ?>
        </ul>
      </div>

      <div class="column">
        <ul>
          <li><a href="/branding/">Branding Magazine</a></li>
          <li><a href="/branding/">新着一覧</a></li>
        </ul>
      </div>

      <div class="column">
        <ul>
          <li><a href="/recruit/career.html">採用情報</a></li>
          <li><a href="/#p07">アクセス</a></li>
          <li><a href="/english.html">English</a></li>
        </ul>
      </div>
    </div>

    <div id="footerSns">
      <ul>
        <li>
          <a href="https://www.facebook.com/TCDcorporation" target="_blank">
            <img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/sns_icon01.svg" alt="" />
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/tcdcorporation/" target="_blank">
            <img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/sns_icon02.svg" alt="" />
          </a>
        </li>
        <li>
          <a href="/contact/">
            <img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/sns_icon03.svg" alt="" />
          </a>
        </li>
      </ul>
    </div>

    <div id="footerUtility">
      <ul>
        <li><a href="/terms.html">ウェブサイト利用規約</a></li>
        <li><a href="/privacy-policy.html">プライバシーポリシー</a></li>
      </ul>
    </div>

    <small><a style="color:white;" href="https://www.tcd.jp/branding_tokyo/">© TCD Corporation Since 1971.</a></small>

    <div id="pageup">
      <a href="#">
        <img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/pageUp_ov.svg" alt="" />
        <img src="<?php echo do_shortcode('[themePass]'); ?>/common/img/pageUp.svg" alt="" />
      </a>
    </div>
  </div>

</footer>

<?php
ob_start();
wp_footer();
$wp_footer_contents = ob_get_clean();
$wp_footer_contents = str_replace('http://', 'https://', $wp_footer_contents);
echo($wp_footer_contents);
?>

<script type="text/javascript">
piAId = '999361';
piCId = '1682';
piHostname = 'pi.pardot.com';

(function() {
	function async_load(){
		var s = document.createElement('script'); s.type = 'text/javascript';
		s.src = ('https:' == document.location.protocol ? 'https://pi' : 'http://cdn') + '.pardot.com/pd.js';
		var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);
	}
	if(window.attachEvent) { window.attachEvent('onload', async_load); }
	else { window.addEventListener('load', async_load, false); }
})();
</script>

</body>
</html>
