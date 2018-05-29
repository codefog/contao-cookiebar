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
 * Extend the palettes.
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'cookiebar_enable';
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] .= ';{cookiebar_legend},cookiebar_enable';

$GLOBALS['TL_DCA']['tl_page']['subpalettes']['cookiebar_enable'] = 'cookiebar_message,cookiebar_button,cookiebar_denail_button,cookiebar_ttl,cookiebar_url,cookiebar_link,cookiebar_position,cookiebar_placement,cookiebar_combineAssets,cookiebar_includeCss';

/*
 * Add the fields
 */
$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_enable'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_enable'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true, 'tl_class' => 'clr'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_message'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_message'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'tl_class' => 'long'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_url'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_url'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'url', 'decodeEntities' => true, 'dcaPicker' => true, 'fieldType' => 'radio', 'tl_class' => 'w50 wizard'],
    'wizard' => [
        function (\Contao\DataContainer $dc) {
            if (version_compare(VERSION, '4.4', '>=')) {
                return '';
            }

            return ' <a href="contao/page.php?do='.\Contao\Input::get('do').'&amp;table='.$dc->table.'&amp;field='.$dc->field.'&amp;value='.rawurlencode(str_replace(['{{link_url::', '}}'], '', $dc->value)).'" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']).'" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':768,\'title\':\''.specialchars(str_replace("'", "\\'", $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['label'][0])).'\',\'url\':this.href,\'id\':\''.$dc->field.'\',\'tag\':\'ctrl_'.$dc->field.(('editAll' === \Contao\Input::get('act')) ? '_'.$dc->id : '').'\',\'self\':this});return false">'.\Contao\Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"').'</a>';
        },
    ],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_position'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_position'],
    'default' => 'top',
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['top', 'bottom'],
    'reference' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_position'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(8) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_placement'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_placement'],
    'default' => 'body_end',
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['body_end', 'before_wrapper'],
    'reference' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_placement'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_button'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_button'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'maxlength' => 128, 'tl_class' => 'w50'],
    'sql' => "varchar(128) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_denail_button'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_denail_button'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'maxlength' => 128, 'tl_class' => 'w50'],
    'sql' => "varchar(128) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_link'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_link'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 128, 'tl_class' => 'w50'],
    'sql' => "varchar(128) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_combineAssets'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_combineAssets'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_includeCss'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_includeCss'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'default' => 1,
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_page']['fields']['cookiebar_ttl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_page']['cookiebar_ttl'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'digit', 'tl_class' => 'w50'],
    'sql' => "varchar(4) NOT NULL default ''",
];
