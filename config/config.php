<?php

/*
 * Content elements
 */
$GLOBALS['TL_CTE']['media']['responsive_youtube_video'] = 'HeimrichHannot\ContentResponsiveYouTubeVideo';

/**
 * Assets
 */
if (TL_MODE == 'FE') {
	$GLOBALS['TL_JAVASCRIPT'][] = '/system/modules/youtube/assets/js/scripts.js|static'; // static -> work around for contao 3
	$GLOBALS['TL_CSS'][] = '/system/modules/youtube/assets/css/style.css';
}