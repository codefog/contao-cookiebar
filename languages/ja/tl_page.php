<?php

/*
 * Cookiebar extension for Contao Open Source CMS
 *
 * Copyright (C) 2011-2018 Codefog
 *
 * @author  Codefog <https://codefog.pl>
 * @author  Kamil Kuzminski <https://github.com/qzminski>
 * @license MIT
 */

/**
 * Fields.
 */
$GLOBALS['TL_LANG']['tl_page']['cookiebar_enable'] = [
    'クッキーバーを有効',
    'ウェブサイトにクッキーの情報のバーを表示します。',
];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_message'] = [
    'クッキーの情報',
    'クッキーについて短い情報を入力してください。',
];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_url'] = [
    'クッキーバーのリンクのURL',
    'さらに詳しいクッキーについての情報を提供するURLを入力できます。.',
];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_position'] = ['クッキーバーの位置', 'ここでクッキーバーの位置を選択できます。'];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_placement'] = [
    'DOMでのクッキーバーの場所',
    'DOM構造でのクッキーバーの場所を選択できます。',
];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_button'] = [
    'クッキーバーのボタンのラベル',
    '承諾のボタンのラベルを入力してください。(例: <em>承諾</em>)',
];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_link'] = [
    'クッキーバーのリンクのタイトル',
    '独自のリンクのタイトルを入力できます。(例 <em>さらに読む</em>)',
];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_combineAssets'] = [
    'クッキーバーのアセットを結合',
    'クッキーバーのCSSとJSのアセットを結合したファイルに追加します。',
];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_includeCss'] = [
    'クッキーバーの初期設定のCSSを含める',
    'クッキーバーの初期設定のスタイルシートを含めます。',
];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_ttl'] = [
    'クッキーバーの表示間隔(日)',
    'クッキーバーを再び表示する前の独自の日数を入力できます。無入力の場合は初期値を使用します。',
];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_analyticsCheckbox'] = [
    'アナリスティックのチェックボックスを追加',
    'ページにアナリスティックからオプトイン・オプトアウトのチェックボックスを追加します。<strong>重要:</strong> 使用方法は公式のドキュメントを参照してください。',
];
$GLOBALS['TL_LANG']['tl_page']['cookiebar_analyticsLabel'] = [
    'アナリスティックのチェックボックスのラベル',
    'アナリスティックのチェックボックスに独自のラベルを入力できます。',
];

/*
 * Legends
 */
$GLOBALS['TL_LANG']['tl_page']['cookiebar_legend'] = 'クッキー情報';

/*
 * Reference
 */
$GLOBALS['TL_LANG']['tl_page']['cookiebar_position']['top'] = 'ページの最上部';
$GLOBALS['TL_LANG']['tl_page']['cookiebar_position']['bottom'] = 'ページの最下部';
$GLOBALS['TL_LANG']['tl_page']['cookiebar_placement']['before_wrapper'] = '#wrapperの前';
$GLOBALS['TL_LANG']['tl_page']['cookiebar_placement']['body_end'] = '&lt;body&gt;の終わる前';
