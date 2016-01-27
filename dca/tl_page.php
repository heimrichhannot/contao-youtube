<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2016 Heimrich & Hannot GmbH
 *
 * @package youtube
 * @author  Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

$dc = &$GLOBALS['TL_DCA']['tl_page'];

/**
 * Selectors
 */
$dc['palettes']['__selector__'][] = 'youtubePrivacy';

/**
 * Palettes
 */
$replace = 'adminEmail;{youtube_legend},youtube_template,youtubePrivacy;';

$dc['palettes']['root'] = str_replace('adminEmail;', $replace, $dc['palettes']['root']);

/**
 * Subpalettes
 */
$dc['subpalettes']['youtubePrivacy'] = 'youtubePrivacyTemplate';


/**
 * Fields
 */
$arrFields = array
(
	'youtube_template'       => array
	(
		'label'            => &$GLOBALS['TL_LANG']['tl_page']['youtube_template'],
		'default'          => 'youtube_default',
		'exclude'          => true,
		'inputType'        => 'select',
		'options_callback' => array('\\HeimrichHannot\\YouTube\\YouTubeBackend', 'getYouTubeTemplates'),
		'eval'             => array('tl_class' => 'w50'),
		'sql'              => "varchar(64) NOT NULL default ''",
	),
	'youtubePrivacy'         => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_page']['youtubePrivacy'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('submitOnChange' => true, 'tl_class' => 'clr'),
		'sql'       => "char(1) NOT NULL default ''",
	),
	'youtubePrivacyTemplate' => array
	(
		'label'            => &$GLOBALS['TL_LANG']['tl_page']['youtubePrivacyTemplate'],
		'exclude'          => true,
		'inputType'        => 'select',
		'default'          => 'youtubeprivacy_default',
		'options_callback' => array('\\HeimrichHannot\\YouTube\\YouTubeBackend', 'getPrivacyTemplates'),
		'eval'             => array('tl_class' => 'w50', 'mandatory' => true),
		'sql'              => "varchar(64) NOT NULL default ''",
	),
);

$dc['fields'] = array_merge($dc['fields'], $arrFields);