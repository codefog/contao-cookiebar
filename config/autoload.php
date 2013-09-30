<?php

/**
 * cookiebar extension for Contao Open Source CMS
 *
 * Copyright (C) 2013 Codefog Ltd
 *
 * @package cookiebar
 * @author  Codefog Ltd <http://codefog.pl>
 * @author  Kamil Kuzminski <kamil.kuzminski@codefog.pl>
 * @license LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'Contao\CookieBar' => 'system/modules/cookiebar/classes/CookieBar.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'cookiebar_default' => 'system/modules/cookiebar/templates/cookiebar'
));
