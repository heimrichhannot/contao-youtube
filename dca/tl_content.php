<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 *
 * @package youtube
 * @author  Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

$dc = &$GLOBALS['TL_DCA']['tl_content'];

/**
 * Selectors
 */
$dc['palettes']['__selector__'][] = 'addPreviewImage';

/**
 * Palettes
 */
$dc['palettes']['youtube'] =
	'{title_legend},type,name,headline;
	{video_legend},youtube,autoplay,videoLength,ytHd,ytShowRelated,ytModestBranding,ytShowInfo;
	{previewImage_legend},addPreviewImage;
	{expert_legend:hide},cssID,space;';

/**
 * Subpalettes
 */
$dc['subpalettes']['addPreviewImage'] = 'posterSRC,size,addPlayButton';


/**
 * Fields
 */
$arrFields = array(
	'addPreviewImage' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_content']['addPreviewImage'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('submitOnChange' => true, 'tl_class' => 'clr'),
		'sql'       => "char(1) NOT NULL default ''",
	),
	
	'addPlayButton' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_content']['addPlayButton'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'w50'),
		'sql'       => "char(1) NOT NULL default ''",
	),

	'videoLength' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_content']['videoLength'],
		'exclude'   => true,
		'search'    => true,
		'sorting'   => true,
		'flag'      => 1,
		'inputType' => 'text',
		'eval'      => array('maxlength' => 255, 'tl_class' => 'w50 clr'),
		'sql'       => "varchar(255) NOT NULL default ''",
	),

	'ytHd' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_content']['ytHd'],
		'exclude'   => true,
		'inputType' => 'select',
		'options'   => array('240', '360', '480', '720', '1080'),
		'eval'      => array('includeBlankOption' => true, 'tl_class' => 'w50'),
		'sql'       => "int(16) NOT NULL",
	),

	'ytShowRelated' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_content']['ytShowRelated'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'w50'),
		'sql'       => "char(1) NOT NULL default ''",
	),

	'ytModestBranding' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_content']['ytModestBranding'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'w50'),
		'sql'       => "char(1) NOT NULL default ''",
	),

	'ytShowInfo' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_content']['ytShowInfo'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('tl_class' => 'w50'),
		'sql'       => "char(1) NOT NULL default ''",
	),
);

$dc['fields'] = array_merge($dc['fields'], $arrFields);