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
 * Register PSR-0 namespace.
 */
if (class_exists('NamespaceClassLoader')) {
    NamespaceClassLoader::add('Codefog\Cookiebar', 'system/modules/cookiebar/src');
}

/*
 * Register the templates
 */
TemplateLoader::addFiles([
    'cookiebar_default' => 'system/modules/cookiebar/templates',
]);
