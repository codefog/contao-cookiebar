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
 * Extend the tl_page palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'cookiebar_enable';
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = str_replace('createSitemap;', 'createSitemap;{cookiebar_legend},cookiebar_enable;', $GLOBALS['TL_DCA']['tl_page']['palettes']['root']);


/**
 * Add the tl_page subpalette
 */
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['cookiebar_enable'] = 'cookiebar_message,cookiebar_button,cookiebar_position,cookiebar_jumpTo';


/**
 * Add the fields to tl_page
 */
$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_enable'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_enable'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_message'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_message'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'clr long'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_jumpTo'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_jumpTo'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'clr'),
	'sql'                     => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_position'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_position'],
	'default'                 => 'top',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('top', 'bottom'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_position'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(8) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_button'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_button'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
	'sql'                     => "varchar(128) NOT NULL default ''"
);
