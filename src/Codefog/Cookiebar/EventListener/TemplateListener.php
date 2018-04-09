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

namespace Codefog\Cookiebar\EventListener;

use Codefog\Cookiebar\CookiebarGenerator;
use Contao\PageModel;

class TemplateListener
{
    /**
     * On output the frontend template.
     *
     * @param string $buffer
     *
     * @return string
     */
    public function onOutputFrontendTemplate($buffer)
    {
        if (null !== ($rootPage = PageModel::findByPk($GLOBALS['objPage']->rootId)) && $rootPage->cookiebar_enable) {
            $generator = new CookiebarGenerator();
            $cookiebar = $generator->createTemplate($rootPage->row())->parse();

            if ('before_wrapper' === $rootPage->cookiebar_placement) {
                $buffer = str_replace('<div id="wrapper">', $cookiebar.'<div id="wrapper">', $buffer);
            } else {
                $buffer = str_replace('</body>', $cookiebar.'</body>', $buffer);
            }
        }

        return $buffer;
    }
}
