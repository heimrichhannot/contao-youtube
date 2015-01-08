<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package Youtube
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'HeimrichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'HeimrichHannot\ContentResponsiveYouTubeVideo' => 'system/modules/youtube/elements/ContentResponsiveYouTubeVideo.php',

	// Classes
	'HeimrichHannot\ResponsiveYouTubeVideo'        => 'system/modules/youtube/classes/ResponsiveYouTubeVideo.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_responsive_youtube_video' => 'system/modules/youtube/templates',
	'news_latest'                 => 'system/modules/youtube/templates',
));
