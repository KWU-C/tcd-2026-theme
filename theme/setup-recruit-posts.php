<?php
/**
 * Recruit投稿タイプの記事を一括作成するセットアップスクリプト
 *
 * 使い方（WP-CLI）:
 *   wp eval-file wp-content/themes/tcd-2026-theme/setup-recruit-posts.php
 *
 * または wp-load.php のパスを合わせてブラウザから実行:
 *   require_once('/path/to/wordpress/wp-load.php');
 */

if (!defined('ABSPATH')) {
  // CLI実行時はwp-load.phpのパスを通す
  $wp_load = dirname(dirname(dirname(dirname(__FILE__)))) . '/wp-load.php';
  if (file_exists($wp_load)) {
    require_once $wp_load;
  } else {
    die('wp-load.php が見つかりません。WP-CLI経由で実行してください。');
  }
}

$posts = array(

  // ------------------------------------------------------------------
  // 1. キャリア採用
  // ------------------------------------------------------------------
  array(
    'post_title'  => 'キャリア採用',
    'post_name'   => 'career',
    'post_type'   => 'recruit',
    'post_status' => 'publish',
    'post_date'   => '2026-03-23 09:00:00',
    'post_content' => <<<'HTML'
<div><img loading="lazy" src="/wp-content/uploads/2017/09/recruite.jpg" alt="" width="750" height="450" /></div>

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
</p>
HTML
  ),

  // ------------------------------------------------------------------
  // 2. 新卒採用
  // ------------------------------------------------------------------
  array(
    'post_title'  => '新卒採用',
    'post_name'   => 'new_outline',
    'post_type'   => 'recruit',
    'post_status' => 'publish',
    'post_date'   => '2026-03-23 09:01:00',
    'post_content' => <<<'HTML'
<h2>【2027年新卒採用】東京　デザイナー職／アカウント・プランナー職</h2>

<p>株式会社TCDは、「経営に、デザインの力を。」をコンセプトに、企業様のブランディング支援・デザイン支援をトータルで手がける会社です。さまざまなブランディングに、アカウント・プランナー、デザイナーとして関わりたいという意欲のある方のご参加をお待ちしています。</p>

<dl class="profile">
<dt>採用予定数</dt>
<dd>若干名</dd>

<dt>職種</dt>
<dd>・デザイナー職（東京支社）<br />
・アカウント・プランナー職（東京支社）</dd>

<dt>資格</dt>
<dd>2027年3月末までに国内外の大学院、大学、高等専門学校（専攻科）を卒業・修了見込みの方。または既に卒業・修了された方（第二新卒を含む）</dd>

<dt>初任給</dt>
<dd>月額260,000円（年俸3,120,000円）<br />
※みなし残業代月32時間分を含む</dd>

<dt>勤務時間</dt>
<dd>裁量労働制／基本時間（9時00分〜18時00分）</dd>

<dt>諸手当</dt>
<dd>年俸に含む</dd>

<dt>勤務地</dt>
<dd>東京支社</dd>

<dt>交通費</dt>
<dd>月上限22,000円まで</dd>

<dt>賞与</dt>
<dd>年2回（7月・12月）</dd>

<dt>昇給</dt>
<dd>能力評価により決定</dd>

<dt>休日</dt>
<dd>年間休日平均128日<br />完全週休2日制／年末年始休暇・夏季休暇／会社指定の特別休業日（年2〜3日）／有給休暇制度あり</dd>

<dt>福利厚生等</dt>
<dd>各種社会保険完備・退職金制度・育児休暇制度他</dd>

<dt>必要書類</dt>
<dd>・履歴書（写真貼付）<br />
・ポートフォリオ（デザイナー職を希望される方のみ）<br />
【下記は後日提出】<br />
・成績証明書<br />
・卒業見込証明書<br />
・健康診断書</dd>

<dt>選考の流れ</dt>
<dd>・エントリー開始：3/1（日）<br />
・会社説明会（オンライン）：3/13（金）・3/27（金）<br />
・エントリー締切：4/13（月）<br />
・書類応募締切：4/15（水）17時まで<br />
・1次面接（オンラインまたは対面）：4/27（月）〜<br />
・2次面接（対面）：5/25（月）〜<br />
・役員面接（対面・最終）：6/15（月）〜<br />
・最終結果通知：6/26（金）予定<br />
<br />
※日時の詳細は、選考を通過された方に別途通知いたします<br />
※上記予定は変更になる場合がございます</dd>

<dt>会社説明会</dt>
<dd>オンラインで開催いたします。ご参加をご希望の方はWantedlyよりエントリーください。<br />
<br />
＞<a href="https://www.wantedly.com/projects/2040482">27卒・ブランディング会社のプランナーが事例と働き方をご紹介！①</a><br />
3月13日（金）17:00〜18:00<br />
<br />
＞<a href="https://www.wantedly.com/projects/2357809">27卒・ブランディング会社のデザイナーが事例と働き方をご紹介！②</a><br />
3月27日（金）17:00〜18:00<br />
<br />
＞<a href="https://www.wantedly.com/projects/2357815">27卒・ブランディング会社のデザイナーが事例と働き方をご紹介！③</a><br />
4月8日（水）17:00〜18:00<br />
<br />
※説明会へのご参加は任意であり、選考には影響いたしません。</dd>

<dt>会社見学会</dt>
<dd>実際に社内をご覧いただけます。ご参加をご希望の方はWantedlyよりエントリーください。<br />
<br />
＞<a href="https://www.wantedly.com/projects/2357818">27卒学生の方向けのオフィスツアー＆社員交流会①</a><br />
3月19日（木）13:30〜<br />
<br />
＞<a href="https://www.wantedly.com/projects/2357826">27卒学生の方向けのオフィスツアー＆社員交流会②</a><br />
3月31日（火）13:30〜<br />
<br />
※見学会へのご参加は任意であり、選考には影響いたしません。</dd>
</dl>

<p class="btnlike"><a target="_blank" href="https://www.tcd.jp/recruit/recruit_entry" rel="noopener">エントリーフォームはこちら</a></p>
HTML
  ),

  // ------------------------------------------------------------------
  // 3. 採用ポリシー
  // ------------------------------------------------------------------
  array(
    'post_title'  => '採用ポリシー',
    'post_name'   => 'policy',
    'post_type'   => 'recruit',
    'post_status' => 'publish',
    'post_date'   => '2026-03-23 09:02:00',
    'post_content' => <<<'HTML'
<p>採用に当たって私達は次の様な方と出会いたいと思っています。<br />
ともにブランディングの可能性を探求していける方のご応募をお待ちしています。</p>

<p class="sttl"><strong>1 美質を尊ぶ人</strong></p>
<p class="indentTxt">TCDの品質基準として特に大切にされているのが「美質」です。<br />
「それはうつくしいか？」と、物性的な品質基準と共に感性的な品質基準として常に私達の作品に問われています。<br />
表現が斬新であること、驚きがあることは言う迄もありませんが、その発想が知的でアイデアに溢れ、美質に富んでいることが何よりも尊ばれます。</p>

<p class="sttl"><strong>2 人の気持ちを測れる人</strong></p>
<p class="indentTxt">私達の職能として、クライアントの気持ち、その先にあるユーザーの気持ち、そして共に生きる仲間の気持ちを推し測る術が常に求められます。<br />
人の気持ちが解れば自分の気持ちも解ってもらえる。自信と誇りを持って接することの出来る人が優先されます。</p>

<p class="sttl"><strong>3 プロ意識の持てる人</strong></p>
<p class="indentTxt">スペシャリストとして確実に結果を出す。それはプロとしてのプライドです。プロには自らの能力が最大に引き出され、且つ有効に活用されるためにスペシャリストとしてのベストコンディションが求められます。プロとしての参加を期待します。</p>
HTML
  ),

);

// 投稿を作成（既存スラッグがあればスキップ）
foreach ($posts as $data) {
  $existing = get_posts(array(
    'post_type'   => 'recruit',
    'name'        => $data['post_name'],
    'post_status' => 'publish',
    'numberposts' => 1,
  ));

  if ($existing) {
    echo "スキップ（既存）: " . $data['post_title'] . "\n";
    continue;
  }

  $id = wp_insert_post(array(
    'post_title'   => $data['post_title'],
    'post_name'    => $data['post_name'],
    'post_type'    => $data['post_type'],
    'post_status'  => $data['post_status'],
    'post_date'    => $data['post_date'],
    'post_content' => $data['post_content'],
  ), true);

  if (is_wp_error($id)) {
    echo "エラー: " . $data['post_title'] . " — " . $id->get_error_message() . "\n";
  } else {
    echo "作成完了: " . $data['post_title'] . " (ID: {$id})\n";
  }
}

echo "\n完了しました。\n";
