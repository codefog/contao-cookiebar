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
 * Hooks.
 */
$GLOBALS['TL_HOOKS']['outputFrontendTemplate'][] = ['Codefog\Cookiebar\EventListener\TemplateListener', 'onOutputFrontendTemplate'];
