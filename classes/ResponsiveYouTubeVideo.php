<?php
namespace HeimrichHannot;

class ResponsiveYouTubeVideo extends \Frontend
{
	protected $strTemplate = 'ce_responsive_youtube_video';

	public function insertTagResponsiveYouTubeVideo($strTag)
	{
		$arrSplit = explode('::', $strTag);
		if ($arrSplit[0] == 'insert_youtube_video')
		{
			if (isset($arrSplit[1]))
			{
				$objTemplate = new \FrontendTemplate($this->strTemplate);
				return $objTemplate->parse();
			}
		}
		return false;
	}

}