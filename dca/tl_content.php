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

$dc                                   = &$GLOBALS['TL_DCA']['tl_content'];
$dc['palettes']['youtube']            =
	'{title_legend},type,name,headline;{video_legend},youtube,autoplay,videoLength,ytHd,ytShowRelated,ytModestBranding,ytShowInfo;{previewImage_legend},addPreviewImage;{expert_legend:hide},cssID,space;';
$dc['palettes']['__selector__'][]     = 'addPreviewImage';
$dc['subpalettes']['addPreviewImage'] = 'posterSRC,size,addPlayButton';

$dc['fields']['addPreviewImage'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['addPreviewImage'],
	'exclude'   => true,
	'inputType' => 'checkbox',
	'eval'      => array('submitOnChange' => true, 'tl_class' => 'w50 clr'),
	'sql'       => "char(1) NOT NULL default ''"
);

$dc['fields']['addPlayButton'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['addPlayButton'],
	'exclude'   => true,
	'inputType' => 'checkbox',
	'eval'      => array('tl_class' => 'w50'),
	'sql'       => "char(1) NOT NULL default ''"
);

$dc['fields']['videoLength'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_content']['videoLength'],
	'exclude'       => true,
	'search'        => true,
	'sorting'       => true,
	'flag'          => 1,
	'inputType'     => 'text',
	'eval'          => array('maxlength' => 255, 'tl_class' => 'w50 clr'),
	'sql'           => "varchar(255) NOT NULL default ''",
);

$dc['fields']['ytHd'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['ytHd'],
	'exclude'   => true,
	'inputType' => 'select',
	'options'   => array('240', '360', '480', '720', '1080'),
	'eval'      => array('includeBlankOption' => true, 'tl_class' => 'w50'),
	'sql'       => "int(16) NOT NULL"
);

$dc['fields']['ytShowRelated'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['ytShowRelated'],
	'exclude'   => true,
	'inputType' => 'checkbox',
	'eval'      => array('tl_class' => 'w50'),
	'sql'       => "char(1) NOT NULL default ''"
);

$dc['fields']['ytModestBranding'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['ytModestBranding'],
	'exclude'   => true,
	'inputType' => 'checkbox',
	'eval'      => array('tl_class' => 'w50'),
	'sql'       => "char(1) NOT NULL default ''"
);

$dc['fields']['ytShowInfo'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['ytShowInfo'],
	'exclude'   => true,
	'inputType' => 'checkbox',
	'eval'      => array('tl_class' => 'w50'),
	'sql'       => "char(1) NOT NULL default ''"
);