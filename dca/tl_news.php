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

$dc = &$GLOBALS['TL_DCA']['tl_news'];

\Controller::loadDataContainer('tl_content');

/**
 * Palettes
 */
$dc['palettes']['default']        = str_replace('{image_legend}', '{youtube_legend},addYouTube;{image_legend}', $dc['palettes']['default']);
$dc['subpalettes']['addYouTube']  =
	'youtube,autoplay,videoLength,ytHd,ytShowRelated,ytModestBranding,ytShowInfo,addPreviewImage,posterSRC,addPlayButton';
$dc['palettes']['__selector__'][] = 'addYouTube';

/**
 * Callbacks
 */

$dc['config']['onload_callback'][] = array('tl_news_youtube', 'modifyPalettes');

/**
 * Fields
 */
$arrFields = array
(
	'addYouTube'       => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_content']['addYouTube'],
		'exclude'   => true,
		'inputType' => 'checkbox',
		'eval'      => array('submitOnChange' => true),
		'sql'       => "char(1) NOT NULL default ''"
	),
	'youtube'          => &$GLOBALS['TL_DCA']['tl_content']['fields']['youtube'],
	'autoplay'         => &$GLOBALS['TL_DCA']['tl_content']['fields']['autoplay'],
	'addPreviewImage'  => &$GLOBALS['TL_DCA']['tl_content']['fields']['addPreviewImage'],
	'posterSRC'        => &$GLOBALS['TL_DCA']['tl_content']['fields']['posterSRC']
);

$dc['fields'] = array_merge($dc['fields'], $arrFields);

$dc['fields']['posterSRC']['eval']['tl_class'] = 'clr';


class tl_news_youtube extends Backend
{

	/**
	 * Modify the palette according to the checkboxes selected
	 *
	 * @param mixed
	 * @param DataContainer
	 *
	 * @return mixed
	 */
	public function modifyPalettes()
	{
		$objNews = \NewsModel::findById($this->Input->get('id'));
		$dc      = &$GLOBALS['TL_DCA']['tl_news'];
		if (!$objNews->addPreviewImage) {
			$dc['subpalettes']['addYouTube'] =
				str_replace('imgHeader,imgPreview,addPlayButton,', '', $dc['subpalettes']['addYouTube']);
		}
	}

}