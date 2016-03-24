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
			$GLOBALS['TL_CSS'][] = 'system/modules/cookiebar/assets/cookiebar.min.css|all';
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/cookiebar/assets/cookiebar.min.js';
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
					$objJump->loadDetails();

					$objTemplate->more = $GLOBALS['TL_LANG']['MSC']['more'];
					$objTemplate->moreHref = ampersand($this->generateFrontendUrl($objJump->row(), null, $objJump->language));
					$objTemplate->moreTitle = specialchars($GLOBALS['TL_LANG']['MSC']['more']);
				}
			}

			// Place the cookiebar in DOM structure
			if ($objRoot->cookiebar_placement === 'before_wrapper') {
				$strContent = str_replace('<div id="wrapper">', $objTemplate->parse() . '<div id="wrapper">', $strContent);
			} else {
				$strContent = str_replace('</body>', $objTemplate->parse() . '</body>', $strContent);
			}
		}

		return $strContent;
	}


	/**
	 * Modify the cached key
	 *
	 * @param string $key
	 *
	 * @return string
	 */
	public function modifyCacheKey($key)
	{
		if ($GLOBALS['objPage']->rootId) {
			// The page is being cached
			$rootPage = \PageModel::findByPk($GLOBALS['objPage']->rootId);
		} else {
			// Page loaded from cache, global $objPage not available
			$rootPage = \PageModel::findFirstPublishedRootByHostAndLanguage(\Environment::get('host'), $GLOBALS['TL_LANGUAGE']);
		}

		if ($rootPage !== null) {
			$key .= $this->isCookiebarEnabled($rootPage) ? '_cookiebar' : '';
		}

		return $key;
	}


	/**
	 * Check whether the cookiebar is enabled and should be displayed
	 *
	 * @param \PageModel $rootPage
	 *
	 * @return boolean
	 */
	protected function isCookiebarEnabled(\PageModel $rootPage = null)
	{
		$objRoot = ($rootPage !== null) ? $rootPage : $this->getCurrentRootPage();

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
