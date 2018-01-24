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
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] .= ';{cookiebar_legend},cookiebar_enable';


/**
 * Add the tl_page subpalette
 */
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['cookiebar_enable'] = 'cookiebar_message,cookiebar_button,cookiebar_position,cookiebar_placement,cookiebar_combineAssets,cookiebar_includeCss,cookiebar_jumpTo,cookiebar_url';


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
	'inputType'               => 'textarea',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'clr'),
	'sql'                     => "text NULL"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_jumpTo'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_jumpTo'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'clr'),
	'sql'                     => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_url'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_url'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('decodeEntities'=>true, 'tl_class'=>'clr'),
	'sql'                     => "varchar(255) NOT NULL default ''"
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

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_placement'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_placement'],
	'default'                 => 'body_end',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('body_end', 'before_wrapper'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_placement'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_button'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_button'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
	'sql'                     => "varchar(128) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_combineAssets'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_combineAssets'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'clr w50 m12'),
    'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_includeCss'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_includeCss'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'default'				  => 1,
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);
