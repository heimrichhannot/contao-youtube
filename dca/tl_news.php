<?php

$dc = &$GLOBALS['TL_DCA']['tl_news'];

/**
 * Palettes
 */
$dc['palettes']['default'] = str_replace('{image_legend}', '{responsiveYouTubeVideo_legend},addResponsiveYouTubeVideo;{image_legend}', $dc['palettes']['default']);
$dc['subpalettes']['addResponsiveYouTubeVideo'] = 'addPreviewImage,imgHeader,posterSRC,addPlayButton,youtube,videoLength,ytHd,ytShowRelated,ytModestBranding,ytShowInfo,ytFullscreen,ytLinkText';
$dc['palettes']['__selector__'][] = 'addResponsiveYouTubeVideo';

/**
 * Callbacks
 */

$dc['config']['onload_callback'][] = array('tl_responsive_youtube_video_news', 'modifyPalettes');

$dc['fields']['addResponsiveYouTubeVideo'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addResponsiveYouTubeVideo'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'					  => array('submitOnChange' => true),
		'sql'                     => "char(1) NOT NULL default ''"
);

$dc['fields']['addPreviewImage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addPreviewImage'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'					  => array('submitOnChange' => true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$dc['fields']['imgHeader'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['imgHeader'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('filesOnly'=>true, 'extensions'=>$GLOBALS['TL_CONFIG']['validImageTypes'], 'nullIfEmpty' => true, 'fieldType'=>'radio', 'tl_class' => 'w50'),
	'sql'                     => "binary(16) NULL"
);

$dc['fields']['posterSRC'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['posterSRC'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio'),
	'sql'                     => "binary(16) NULL"
);

$dc['fields']['addPlayButton'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addPlayButton'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$dc['fields']['youtube'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['youtube'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'url', 'mandatory'=>true),
	'sql'                     => "varchar(16) NOT NULL default ''"
);

$dc['fields']['videoLength'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['videoLength'],
		'exclude'                 => true,
		'search'                  => true,
		'sorting'                 => true,
		'flag'                    => 1,
		'inputType'               => 'text',
		'eval'                    => array('maxlength' => 255, 'tl_class' => 'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
);

$dc['fields']['ytHd'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ytHd'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => array('240', '360', '480', '720', '1080'),
		'eval'                    => array('includeBlankOption' => true, 'tl_class' => 'w50'),
		'sql'                     => "int(16) NOT NULL"
);

$dc['fields']['ytShowRelated'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ytShowRelated'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$dc['fields']['ytModestBranding'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ytModestBranding'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$dc['fields']['ytShowInfo'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ytShowInfo'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$dc['fields']['ytFullscreen'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ytFullscreen'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50 clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$dc['fields']['ytLinkText'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ytLinkText'],
	'exclude'                 => true,
	'flag'                    => 1,
	'inputType'               => 'text',
	'eval'                    => array('maxlength' => 255, 'tl_class' => 'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

class tl_responsive_youtube_video_news extends Backend {

	/**
	 * Modify the palette according to the checkboxes selected
	 * @param mixed
	 * @param DataContainer
	 * @return mixed
	 */
	public function modifyPalettes()
	{
		$objNews = \NewsModel::findById($this->Input->get('id'));
		$dc = &$GLOBALS['TL_DCA']['tl_news'];
		if (!$objNews->addPreviewImage) {
			$dc['subpalettes']['addResponsiveYouTubeVideo'] =
				str_replace('imgHeader,imgPreview,addPlayButton,', '', $dc['subpalettes']['addResponsiveYouTubeVideo']);
		}
	}

}