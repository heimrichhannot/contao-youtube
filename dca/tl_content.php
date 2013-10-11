<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

$dc = &$GLOBALS['TL_DCA']['tl_content'];
$dc['palettes']['responsive_youtube_video'] = '{title_legend},type,name,headline;{previewImage_legend},addPreviewImage;{video_legend},videoId,ytHd,ytShowRelated,ytModestBranding,ytShowInfo;{expert_legend:hide},cssID,space;';
$dc['palettes']['__selector__'][] = 'addPreviewImage';
$dc['subpalettes']['addPreviewImage'] = 'imgHeader,imgPreview,addPlayButton';

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
	'eval'                    => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'),
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