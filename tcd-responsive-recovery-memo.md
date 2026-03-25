# TCD 2026 レスポンシブ復旧メモ

## 結論
2026テーマは `base.css` の共通レスポンシブは残っていますが、旧サイト側で使っていたページ別のスマホ調整が 2026 側では十分に引き継がれていません。

そのため、まずは `tcd-responsive-recovery.css` を **最後に1本だけ追加読み込み** して、旧サイトのレスポンシブ挙動を戻す方針が最短です。

## 根拠
- 2026テーマの読み込み順は `base.css` → `page.css` → `page_branding.css` → `page_case.css` → `top.css`。つまり復旧用CSSはこれらの後ろに置く必要があります。
- 2026テーマ側では `top.css` は `max-width: 480px` が1本、`page_case.css` も `max-width: 480px` が1本のみで、ページ別のSP崩しが薄いです。
- 旧サイト統合版 `site.css` には `@media only screen and (max-width: 900px)`, `640px`, `480px` のまとまったレスポンシブ定義があり、各カテゴリートップ・詳細・ナビ・トップページの崩しが含まれています。

## 開発への依頼内容
1. `tcd-responsive-recovery.css` をテーマに追加
2. `functions.php` で **`top.css` の後に** enqueue
3. まず以下を実機確認
   - トップ
   - case一覧
   - case詳細
   - branding一覧 / 詳細
   - namingカテゴリ
   - recruit / profile / service
4. 問題なければ、次フェーズで復旧CSSを各既存CSSへ分配して整理

## enqueue例
```php
wp_enqueue_style(
  'tcd-responsive-recovery',
  get_template_directory_uri() . '/css/tcd-responsive-recovery.css',
  array('tcd-top'),
  filemtime(get_template_directory() . '/css/tcd-responsive-recovery.css')
);
```

## 注意
- このパッチは「まず旧サイト相当のSP挙動を戻す」ことが目的です。
- 既存の2026デザインを完全に再設計するものではありません。
- `html { font-size: 100%; }` が 900px 以下で入るため、`base.css` 側でスマホ時に `html` を縮小している場合は、このパッチと競合します。レスポンシブ復旧を優先するなら、このパッチ側を正としてください。
- その後のデザイン調整は、復旧確認後に個別対応するのが安全です。
