# FINAL_CSS_MAP.md
# TCD 2026 Theme — CSS 最終構成

> 2026年3月時点の整理フェーズ完了後の状態を記録したドキュメント。
> 再開時はこのファイルを最初に参照すること。

---

## 1. CSS 構成（最終状態）

### 常時読み込み（全ページ）

| ファイル | 役割 |
|---|---|
| `assets/css/vendor/drawer.css` | ハンバーガーメニュー（全ページ body.drawer--right） |
| `common/css/base.css` | 唯一の正本 CSS |

### 条件付き読み込み

| ファイル | 対象ページ |
|---|---|
| `common/js/lib/slider/jquery.bxslider.css` | front-page / single-works / single-about / 採用系ページ / desart ページ |

> 条件付き enqueue は `functions.php` の `tcd_enqueue_bxslider()` で管理。
> テンプレート直書きは全て除去済み。

### 廃止済み（enqueue 停止・ファイル削除済み）

| ファイル | 廃止理由 |
|---|---|
| `basis.min.css` | 使用セレクタ6個のみ → base.css に移設済み |
| `slick.css` | dead CSS（slick.js 未使用・HTML実装なし） |
| `slick-theme.css` | 同上 |
| `css/page.css` | base.css に統合済み |
| `css/page_branding.css` | 同上 |
| `css/page_case.css` | 同上 |
| `css/top.css` | 同上 |

---

## 2. base.css の位置づけ

**base.css はこのプロジェクトにおける唯一の正本 CSS。**

### 含む範囲

- 基本タイポグラフィ
- レイアウト
- 共通コンポーネント
- グリッド
- ナビゲーション
- 詳細ページ構造
- 運用中に必要と判断されたスタイル

### 含めないもの

- 未使用コード
- vendor 固有スタイル
- 応急処置
- 連番命名のレイアウト（`layoutTypXX` 等）

---

## 3. コアコンポーネント一覧

### 本文

| クラス | 役割 |
|---|---|
| `.detail__main_cont` | 本文スタイルの唯一の正本。フォント・行間・リスト・画像はここで管理 |

### 記事レイアウト

| クラス | 役割 |
|---|---|
| `.article-shell` | 記事外枠（白カード・幅・影） |
| `.article-shell_Title` | タイトル領域 |
| `.article-shell_Inner` | 本文エリア |
| `.article-shell_Sns` | SNS シェアボタン |
| `.article-shell_bottom` | 関連記事エリア |

### グリッド

| クラス | 役割 |
|---|---|
| `.service-card-grid` | トップのサービス一覧 |
| `.works-card-grid` | front-page の実績3列カード |
| `.content-card-grid` | single-works / service / branding 下部の関連カード |
| `.archive-card-grid` | archive / taxonomy の一覧 |

### ナビゲーション・導線

| クラス | 役割 |
|---|---|
| `.filter-nav` | カテゴリ切替ナビ |
| `.access-two-col` | 地図＋テキスト2列 |
| `.section-top-concept` | トップのコンセプト文章 |

---

## 4. 意図的に残している要素

以下は未整理ではなく「触らない判断をしたもの」。

| 要素 | 状態 | 扱い方 |
|---|---|---|
| `.worksTyp03` | 現役・単独動作 | 触るときは単独調査の上、別フェーズで対応 |
| `.serviceTyp12` | page.php ページ専用 | ページ内完結・干渉なし。現状維持 |
| `.clearfix` | archive-case.php 等で現役 | 削除しない。将来の整理は別フェーズ |
| `.c-card-tile` | 将来 BEM 化予定 | 設計判断が必要。現フェーズでは手を付けない |

---

## 5. CSS 運用ルール

### 原則

- `base.css` を中心に調整する
- 既存クラスで解決することを優先する
- 新規クラス追加は最終手段
- 構造を壊さない

### 禁止事項

- `layoutTypXX` の再導入
- HTML へのインライン style（`style="..."` 属性）
- `!important` の多用（使う場合は理由をコメントに残す）
- `tmp` / `fix` / `new2` / `old` などの命名
- 同一責務のクラス増殖
- ページ専用調整の共通 CSS への混入

### 修正フロー

1. 既存クラスで解決できるか確認
2. 既存責務内で値を調整
3. どうしても必要なら新規クラスを追加
4. 必要ならコメントで理由を残す

### vendor CSS の扱い

**残す:**
- `drawer.css`
- `jquery.bxslider.css`（条件付き）

**廃止済み:**
- `basis.min.css`
- slick 関連（CSS・JS・ディレクトリ全て削除済み）

---

## 6. 修正チェックリスト

### 修正前

- [ ] 対象は本文か？レイアウトか？カードか？導線か？（責務を確認）
- [ ] 既存クラスで対応できないか？
- [ ] PC / SP 両方の確認が必要か？
- [ ] JS 依存要素（bxSlider 初期化対象、opacity 制御等）に影響しないか？
- [ ] `.detail__main_cont` / `.article-shell` の正本を変えることになっていないか？

### 修正後

- [ ] 旧セレクタと競合していないか
- [ ] 似た責務のクラスを増やしていないか
- [ ] SP 崩れがないか
- [ ] 今回の変更理由を説明できるか
- [ ] 応急処置になっていないか（同じ修正を将来また繰り返す構造になっていないか）

---

## 7. 現在の到達状態

- CSS の重複・競合 → 解消済み
- base.css への統合 → 完了
- `layoutTypXX` 命名 → 完全廃止
- vendor 依存 → 最小化（drawer + bxslider のみ）
- クラス命名 → 意味ベースに統一

---

## 8. 最終方針

> このCSSはすでに「整理フェーズ」を終えている。今後は「運用フェーズ」。

- **追加より整理を優先する**
- **応急処置を作らない**
- **次の人が理解できる状態を維持する**
