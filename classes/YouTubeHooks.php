<?php
/**
 * Contao Open Source CMS
 * 
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package anwaltverein
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\YouTube;


class YouTubeHooks extends \Controller
{

	public function parseNewsArticlesHook($objTemplate, $arrNews, $objModule)
	{
		if(!$arrNews['addYouTube']) return;

		$objConfig = YouTubeSettings::getInstance()->setModule($objModule->getModel());
		
		YouTubeVideo::getInstance()->setData($objTemplate->getData())->setConfig($objConfig)->addToTemplate($objTemplate);
	}

}