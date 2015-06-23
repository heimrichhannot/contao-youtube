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

namespace HeimrichHannot\YouTube;

class YouTubeVideo extends \Frontend
{
	protected static $strTemplate = 'youtube_default';

	public static function addVideoToTemplate($objTemplate, $arrData, $objConfig)
	{
		$objItem                   = (object) $arrData;
		$objTemplate->youtubeVideo = static::generate($objItem, $objConfig);
	}

	public static function generate($objItem, $objConfig)
	{
		// tl_content type youtube or addYoutube for tl_news must be set
		if ($objItem->type != 'youtube' && !$objItem->addYouTube && $objItem->youtube == '') {
			return;
		}

		$objTemplate = new \FrontendTemplate($objConfig->youtube_template != '' ? $objConfig->youtube_template : static::$strTemplate);

		// set from item
		$objTemplate->setData((array) $objItem);

		if ($objItem->addPreviewImage) {
			$singleSRC = '';

			if ($objItem->posterSRC != '') {
				$objModel = \FilesModel::findByUuid($objItem->posterSRC);

				if ($objModel !== null) {
					$singleSRC = $objModel->path;
				}
			}

			// add youtube thumbnail
			if ($singleSRC == '') {
				$ytPosterSRC = static::getYouTubeImage($objItem->youtube);

				$strPosterSRC  = $objItem->youtube . '_' . basename($ytPosterSRC);
				$strPosterPath = 'files/youtube/' . $strPosterSRC;

				$objFile = new \File($strPosterPath, file_exists(TL_ROOT . '/' . $strPosterPath));

				// simple file caching
				if ($objConfig->tstamp > $objFile->mtime || $objFile->size == 0) {
					$objFile->write(@file_get_contents($ytPosterSRC));
					$objFile->close();
				}

				$singleSRC = $objFile->value;
			}

			if (file_exists(TL_ROOT . '/' . $singleSRC)) {
				$arrImage['singleSRC'] = $singleSRC;
				$arrImage['alt']       = 'youtube-image-' . $objItem->youtube;

				if ($objConfig->imgSize != '' || $objConfig->size) {
					$size = deserialize($objConfig->imgSize ? $objConfig->imgSize : $objConfig->size);

					if ($size[0] > 0 || $size[1] > 0 || is_numeric($size[2]))
					{
						$arrImage['size'] = $objConfig->imgSize;
					}
				}
				
				\Controller::addImageToTemplate($objTemplate, $arrImage);
			}

		}
		
		return $objTemplate->parse();
	}

	public static function getYouTubeImage($strID)
	{
		$resolution = array(
			'maxresdefault',
			'sddefault',
			'mqdefault',
			'hqdefault',
			'default'
		);

		for ($x = 0; $x < sizeof($resolution); $x++) {
			$url = 'http://img.youtube.com/vi/' . $strID . '/' . $resolution[$x] . '.jpg';
			if (get_headers($url)[0] == 'HTTP/1.0 200 OK') {
				break;
			}
		}

		return $url;
	}

}