<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Responsive_youtube_video
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
	'HeimrichHannot\ContentResponsiveYouTubeVideo' => 'system/modules/responsive_youtube_video/elements/ContentResponsiveYouTubeVideo.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_responsive_youtube_video' => 'system/modules/responsive_youtube_video/templates',
));
