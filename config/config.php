<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/*
 * Content elements
 */
$GLOBALS['TL_CTE']['media']['responsive_youtube_video'] = 'HeimrichHannot\ContentResponsiveYouTubeVideo';

/**
 * Assets
 */
if (TL_MODE == 'FE') {
	$GLOBALS['TL_JAVASCRIPT'][] = '/system/modules/responsive_youtube_video/assets/js/scripts.js|static'; // static -> work around for contao 3
	$GLOBALS['TL_CSS'][] = '/system/modules/responsive_youtube_video/assets/css/style.css';
}