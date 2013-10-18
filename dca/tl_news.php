<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

$dc = &$GLOBALS['TL_DCA']['tl_news'];

$dc['palettes']['default'] = str_replace('{image_legend}', '{responsiveYouTubeVideo_legend},addResponsiveYouTubeVideo;{image_legend}', $dc['palettes']['default']);

$dc['subpalettes']['addResponsiveYouTubeVideo'] = 'addPreviewImage,imgHeader,imgPreview,addPlayButton,videoId,videoLength,ytHd,ytShowRelated,ytModestBranding,ytShowInfo';
$dc['palettes']['__selector__'][] = 'addResponsiveYouTubeVideo';

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
	'eval'                    => array('filesOnly'=>true, 'extensions'=>$GLOBALS['TL_CONFIG']['validImageTypes'], 'fieldType'=>'radio', 'tl_class' => 'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$dc['fields']['imgPreview'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['imgPreview'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('filesOnly'=>true, 'extensions'=>$GLOBALS['TL_CONFIG']['validImageTypes'], 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class' => 'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$dc['fields']['addPlayButton'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addPlayButton'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$dc['fields']['videoId'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['videoId'],
	'exclude'                 => true,
	'search'                  => true,
	'sorting'                 => true,
	'flag'                    => 1,
	'inputType'               => 'text',
	'eval'                    => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50 clr'),
	'sql'                     => "varchar(255) NOT NULL default ''"
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