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

namespace Codefog\Cookiebar;

use Contao\FrontendTemplate;

class CookiebarGenerator
{
    /**
     * Create the cookie bar template.
     *
     * @param array  $data
     * @param string $name
     *
     * @return FrontendTemplate
     */
    public function createTemplate(array $data, $name = 'cookiebar')
    {
        $template = new FrontendTemplate($name);
        $this->setBasicData($template, $data);
        $this->setMoreLinkData($template, $data);
        $this->setAnalyticsCheckboxData($template, $data);

        // Cookie name
        $template->cookie = sprintf('COOKIEBAR_%s', $data['id']);

        return $template;
    }

    /**
     * Automatically set all variables with cookiebar_ prefix.
     *
     * @param FrontendTemplate $template
     * @param array            $data
     */
    private function setBasicData(FrontendTemplate $template, array $data)
    {
        foreach ($data as $k => $v) {
            if (0 === strpos($k, 'cookiebar_')) {
                $template->{substr($k, 10)} = $v;
            }
        }

        $template->raw = $data;
    }

    /**
     * Set the "more" link data.
     *
     * @param FrontendTemplate $template
     * @param array            $data
     */
    private function setMoreLinkData(FrontendTemplate $template, array $data)
    {
        $template->more = null;

        if ($data['cookiebar_url']) {
            $template->more = [
                'label' => $data['cookiebar_link'] ?: $GLOBALS['TL_LANG']['MSC']['cookiebar.more'],
                'url' => $data['cookiebar_url'],
            ];
        }
    }

    /**
     * Set the "analytics" checkbox data.
     *
     * @param FrontendTemplate $template
     * @param array            $data
     */
    private function setAnalyticsCheckboxData(FrontendTemplate $template, array $data)
    {
        $template->analyticsCheckbox = null;

        if ($data['cookiebar_analyticsCheckbox']) {
            $template->analyticsCheckbox = [
                'label' => $data['cookiebar_analyticsLabel'] ?: $GLOBALS['TL_LANG']['MSC']['cookiebar.analytics'],
            ];
        }
    }
}
