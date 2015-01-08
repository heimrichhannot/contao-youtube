<?php
namespace HeimrichHannot;


class ContentResponsiveYouTubeVideo extends \ContentElement
{

	protected $strTemplate = 'ce_responsive_youtube_video';
	protected static $iFrameIdCounter = 0;

	protected function compile()
	{
		if (TL_MODE == 'FE') {
			$this->Template = new \FrontendTemplate($this->strTemplate);
			$this->Template->setData($this->arrData);
			$this->Template->iFrameId = 'ytIFrame' . static::$iFrameIdCounter++;
			if ($this->addPreviewImage)
			{
				if (\Validator::isUuid($this->imgHeader))
				{
					$objHeader = \FilesModel::findByUuid($this->imgHeader);

					if($objHeader !== null)
					{
						$this->Template->header = $objHeader;
					}

				}

				if (\Validator::isUuid($this->posterSRC))
				{
					$objPoster = \FilesModel::findByUuid($this->posterSRC);

					if($objPoster !== null)
					{
						$this->Template->poster = $objPoster;
					}

				}
			}
		}
		else
		{
			$this->strTemplate     = 'be_wildcard';
			$this->Template        = new \BackendTemplate($this->strTemplate);
			$this->Template->title = 'YouTube-Video ' . $this->youtube;
		}
	}

	public static function getImagePath($id)
	{
		$objModel = \FilesModel::findByPk($id);

		if ($objModel !== null && is_file(TL_ROOT . '/' . $objModel->path))
			return $objModel->path;
	}
}
