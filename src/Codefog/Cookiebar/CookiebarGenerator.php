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
use Contao\PageModel;

class CookiebarGenerator
{
    /**
     * Create the cookie bar template.
     *
     * @param array $data
     *
     * @return FrontendTemplate
     */
    public function createTemplate(array $data)
    {
        $template = new FrontendTemplate('cookiebar_default');
        $this->setBasicData($template, $data);
        $this->setMoreLinkData($template, $data);

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
        $url = null;

        // Use the URL that was provided explicitly
        if ($data['cookiebar_url']) {
            $url = $data['cookiebar_url'];
        } elseif ($data['cookiebar_jumpTo'] > 0 && null !== ($targetPage = PageModel::findByPk($data['cookiebar_jumpTo']))) {
            // Use the selected page URL
            $url = $targetPage->getFrontendUrl();
        }

        $template->more = null;

        // Set the template data
        if (null !== $url) {
            $template->more = [
                'label' => $data['cookiebar_link'] ?: $GLOBALS['TL_LANG']['MSC']['cookiebar.more'],
                'url' => $url,
            ];
        }
    }
}
