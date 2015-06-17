<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
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
	'HeimrichHannot\YouTube\ContentYouTube' => 'system/modules/youtube/elements/ContentYouTube.php',

	// Classes
	'HeimrichHannot\YouTube\YouTubeBackend' => 'system/modules/youtube/classes/YouTubeBackend.php',
	'HeimrichHannot\YouTube\YouTubeHooks'   => 'system/modules/youtube/classes/YouTubeHooks.php',
	'HeimrichHannot\YouTube\YouTubeVideo'   => 'system/modules/youtube/classes/YouTubeVideo.php',
	'HeimrichHannot\YouTube\UpgradeHandler' => 'system/modules/youtube/classes/UpgradeHandler.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'youtube_default' => 'system/modules/youtube/templates/youtube',
	'youtube_image'   => 'system/modules/youtube/templates/youtube',
	'youtube_player'  => 'system/modules/youtube/templates/youtube',
	'news_latest'     => 'system/modules/youtube/templates/news',
	'ce_youtube'      => 'system/modules/youtube/templates/elements',
));
