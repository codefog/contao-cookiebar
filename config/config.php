<?php

/**
 * cookiebar extension for Contao Open Source CMS
 *
 * Copyright (C) 2013 Codefog
 *
 * @package cookiebar
 * @author  Codefog <http://codefog.pl>
 * @author  Kamil Kuzminski <kamil.kuzminski@codefog.pl>
 * @license LGPL
 */


/**
 * Extension version
 */
@define('COOKIEBAR_VERSION', '1.3');
@define('COOKIEBAR_BUILD', '2');


/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['generatePage'][] = ['CookieBar', 'addCookiebarScripts'];

// not longer supported in contao 4
if (version_compare(VERSION, '4.0', '<')) {
    $GLOBALS['TL_HOOKS']['getCacheKey'][] = ['CookieBar', 'modifyCacheKey'];
}

$GLOBALS['TL_HOOKS']['outputFrontendTemplate'][] = ['CookieBar', 'addCookiebarBuffer'];
$GLOBALS['TL_HOOKS']['replaceInsertTags'][]      = ['CookieBar', 'replaceCookiebarInsertTags'];