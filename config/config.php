<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package youtube
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['media']['youtube'] = '\\HeimrichHannot\\YouTube\\ContentYouTube';

/**
 * Assets
 */
if (TL_MODE == 'FE')
{
	$GLOBALS['TL_JAVASCRIPT']['jquery.youtube'] = '/system/modules/youtube/assets/js/jquery.youtube.js|static';
	$GLOBALS['TL_CSS']['youtube_default'] = '/system/modules/youtube/assets/css/youtube_default.less|screen|static|1.0.0';
}

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseArticles'][] = array('\\HeimrichHannot\\YouTube\\YouTubeHooks', 'parseNewsArticlesHook');