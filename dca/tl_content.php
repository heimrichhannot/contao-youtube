<?php

$dc = &$GLOBALS['TL_DCA']['tl_content'];
$dc['palettes']['responsive_youtube_video'] = '{title_legend},type,name,headline;{previewImage_legend},addPreviewImage;{video_legend},youtube,videoLength,ytHd,ytShowRelated,ytModestBranding,ytShowInfo,ytFullscreen,ytLinkText;{expert_legend:hide},cssID,space;';
$dc['palettes']['__selector__'][] = 'addPreviewImage';
$dc['subpalettes']['addPreviewImage'] = 'imgHeader,posterSRC,addPlayButton';

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

$dc['fields']['addPlayButton'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addPlayButton'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
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
		'eval'                    => array('tl_class' => 'w50'),
		'sql'                     => "char(1) NOT NULL default ''"
);

$dc['fields']['ytLinkText'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ytLinkText'],
		'exclude'                 => true,
		'flag'                    => 1,
		'inputType'               => 'text',
		'eval'                    => array('maxlength' => 255, 'tl_class' => 'w50 clr'),
		'sql'                     => "varchar(255) NOT NULL default ''"
);