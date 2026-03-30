#!/usr/bin/env node
/**
 * ファイル変更を監視して自動FTPアップロード
 * 起動: node watch-upload.js
 */

const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

const LOCAL_BASE  = '/Users/kwu/Documents/tcd-2026-theme';
const FTP_BASE    = 'ftp://ftp-tcdsite.heteml.net/web/2026.tcd.jp/wp-content/themes/tcd';
const FTP_USER    = 'tcdadmin:Hg5Vw9CWVqBJ';

// アップロード対象外
const IGNORE = [
  'node_modules', '.git', '.DS_Store',
  'watch-upload.js', 'css/for_dev', 'CLAUDE.md'
];

function shouldIgnore(filePath) {
  return IGNORE.some(ig => filePath.includes(ig));
}

// デバウンス管理
const pending = new Map();

function upload(filePath) {
  if (!fs.existsSync(filePath)) return; // 削除ファイルは無視
  if (!fs.statSync(filePath).isFile()) return;

  const rel = path.relative(LOCAL_BASE, filePath);
  const ftpUrl = `${FTP_BASE}/${rel}`;

  try {
    execSync(`curl -s -T "${filePath}" "${ftpUrl}" --user "${FTP_USER}"`, { timeout: 30000 });
    const now = new Date().toLocaleTimeString('ja-JP');
    console.log(`[${now}] ✓ ${rel}`);
  } catch (e) {
    console.error(`[ERROR] ${rel}: ${e.message}`);
  }
}

function onChange(filePath) {
  if (shouldIgnore(filePath)) return;

  // 300ms デバウンス（連続保存対策）
  if (pending.has(filePath)) clearTimeout(pending.get(filePath));
  pending.set(filePath, setTimeout(() => {
    pending.delete(filePath);
    upload(filePath);
  }, 300));
}

fs.watch(LOCAL_BASE, { recursive: true }, (event, filename) => {
  if (!filename) return;
  onChange(path.join(LOCAL_BASE, filename));
});

console.log('監視開始: ファイルを保存すると自動でサーバにアップロードされます');
console.log('停止: Ctrl+C\n');
