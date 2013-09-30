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

namespace Contao;


/**
 * Extension version
 */
class CookieBar extends \Frontend
{

	/**
	 * Add the cookie information scripts
	 */
	public function addCookiebarScripts()
	{
		if ($this->isCookiebarEnabled())
		{
			$GLOBALS['TL_CSS'][] = 'system/modules/cookiebar/assets/cookiebar.min.css||static';
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/cookiebar/assets/cookiebar.min.js|static';
		}
	}


	/**
	 * Add the cookie HTML buffer
	 * @param string
	 * @return string
	 */
	public function addCookiebarBuffer($strContent)
	{
		if ($this->isCookiebarEnabled())
		{
			$objRoot = $this->getCurrentRootPage();
			$objTemplate = new \FrontendTemplate('cookiebar_default');

			$objTemplate->message = $objRoot->cookiebar_message;
			$objTemplate->position = $objRoot->cookiebar_position;
			$objTemplate->button = $objRoot->cookiebar_button;
			$objTemplate->cookie = $this->getCookiebarName($objRoot);
			$objTemplate->more = '';

			// Add the "more" link
			if ($objRoot->cookiebar_jumpTo > 0)
			{
				$objJump = \PageModel::findByPk($objRoot->cookiebar_jumpTo);

				if ($objJump !== null)
				{
					$objTemplate->more = $GLOBALS['TL_LANG']['MSC']['more'];
					$objTemplate->moreHref = ampersand($this->generateFrontendUrl($objJump->row()));
					$objTemplate->moreTitle = specialchars($GLOBALS['TL_LANG']['MSC']['more']);
				}
			}

			$strContent = str_replace('</body>', $objTemplate->parse() . '</body>', $strContent);
		}

		return $strContent;
	}


	/**
	 * Check whether the cookiebar is enabled and should be displayed
	 * @return boolean
	 */
	protected function isCookiebarEnabled()
	{
		$objRoot = $this->getCurrentRootPage();

		if ($objRoot->cookiebar_enable && !\Input::cookie($this->getCookiebarName($objRoot)))
		{
			return true;
		}

		return false;
	}


	/**
	 * Get the current root page and return it
	 * @return object
	 */
	protected function getCurrentRootPage()
	{
		global $objPage;
		$strKey = 'COOKIEBAR_ROOT_' . $objPage->rootId;

		if (!\Cache::has($strKey))
		{
			\Cache::set($strKey, \PageModel::findByPk($objPage->rootId));
		}

		return \Cache::get($strKey);
	}


	/**
	 * Return the cookie name
	 * @param object
	 * @return string
	 */
	protected function getCookiebarName($objPage)
	{
		return 'COOKIEBAR_' . $objPage->id;
	}
}
