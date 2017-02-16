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

use HeimrichHannot\Haste\Util\Curl;

class YouTubeVideo
{
    protected static $strTemplate = 'youtube_default';

    protected static $strFullsizeTemplate = 'youtube_modal';

    protected static $strPrivacyTemplate = 'youtubeprivacy_default';

    protected static $defaultEmbedSrc = '//www.youtube.com/embed/';

    protected static $privacyEmbedSrc = '//www.youtube-nocookie.com/embed/';

    /**
     * Current object instance (do not remove)
     *
     * @var YouTubeVideo
     */
    protected static $objInstance;

    protected $arrData = [];

    protected $arrConfig = [];

    protected function __construct()
    {
    }

    /**
     * Prevent cloning of the object (Singleton)
     */
    final public function __clone()
    {
    }

    /**
     * Instantiate a new user object (Factory)
     *
     * @return static The object instance
     */
    public static function getInstance()
    {
        if (static::$objInstance === null)
        {
            static::$objInstance = new static();
        }

        return static::$objInstance;
    }

    public function addToTemplate($objTemplate)
    {
        $objTemplate->youtubeVideo = $this->generate();
    }

    public function generate($blnIgnoreFullsize = false)
    {
        if (!$this->init() && !$blnIgnoreFullsize)
        {
            return '';
        }

        // always show preview image when in privacy mode
        $this->addPreviewImage = $this->addPreviewImage || $this->getConfigData('youtubePrivacy');

        $objTemplate =
            new \FrontendTemplate($this->getConfigData('youtube_template') != '' ? $this->getConfigData('youtube_template') : static::$strTemplate);

        // set from item
        $objTemplate->setData($this->getData());
        $objTemplate->playTitle  = $GLOBALS['TL_LANG']['MSC']['youtube']['play'];
        $objTemplate->youtubeSrc = static::getYouTubeSrc();

        $this->addConfigToTemplate($objTemplate);

        // add preview image when in privacy mode, cause we need something to show
        if ($this->addPreviewImage || $this->getConfigData('youtubePrivacy'))
        {
            $this->addPreviewImageToTemplate($objTemplate);
        }

        if ($this->getConfigData('youtubePrivacy'))
        {
            $this->addPrivacyToTemplate($objTemplate);
        }

        // fullsize link template
        if ($this->youtubeFullsize && !$blnIgnoreFullsize)
        {
            $objTemplateFullsize = new \FrontendTemplate(static::$strFullsizeTemplate);
            $objTemplateFullsize->setData($objTemplate->getData());

            $objTemplateFullsize->youtubeVideo = $this->generate(true);
            $objTemplate->fullsizeLink         = $objTemplateFullsize->parse();
        }

        return $objTemplate->parse();
    }

    protected function addPrivacyToTemplate($objTemplate)
    {
        $objTemplate->privacy       = $this->generatePrivacy();
        $objTemplate->addPlayButton = true;
    }

    protected function addConfigToTemplate($objTemplate)
    {
        // add settings
        foreach ($this->getConfig() as $key => $value)
        {
            $objTemplate->{$key} = $value;
        }
    }

    protected function addPreviewImageToTemplate($objTemplate)
    {
        $singleSRC = '';

        if ($this->posterSRC != '')
        {
            $objModel = \FilesModel::findByUuid($this->posterSRC);

            if ($objModel !== null)
            {
                $singleSRC = $objModel->path;
            }
        }

        // add youtube thumbnail
        if ($singleSRC == '')
        {
            $singleSRC = static::getCachedYouTubePreviewImage();
        }

        if (file_exists(TL_ROOT . '/' . $singleSRC))
        {
            $arrImage['singleSRC'] = $singleSRC;
            $arrImage['alt']       = 'youtube-image-' . $this->youtube;

            if ($this->getConfigData('imgSize') != '' || $this->getConfigData('size'))
            {
                $size = deserialize($this->getConfigData('imgSize') ? $this->getConfigData('imgSize') : $this->getConfigData('size'));

                if ($size[0] > 0 || $size[1] > 0 || is_numeric($size[2]))
                {
                    $arrImage['size'] = $size;
                }
            }

            \Controller::addImageToTemplate($objTemplate, $arrImage);
        }
    }

    public function getCachedYouTubePreviewImage()
    {
        list($ytPosterSRC, $strResult) = static::getYouTubeImage($this->youtube);

        $strPosterSRC  = $this->youtube . '_' . basename($ytPosterSRC);
        $strPosterPath = 'files/media/youtube/' . $strPosterSRC;

        $objFile = new \File($strPosterPath, file_exists(TL_ROOT . '/' . $strPosterPath));

        // simple file caching
        if ($this->tstamp > $objFile->mtime || $objFile->size == 0)
        {
            $objFile->write($strResult);
            $objFile->close();
        }

        return $objFile->value;
    }

    protected function generatePrivacy()
    {
        $objTemplate = new \FrontendTemplate(
            $this->getConfigData('youtubeprivacy_template') != '' ? $this->getConfigData('youtubeprivacy_template') : static::$strPrivacyTemplate
        );
        $objTemplate->setData($GLOBALS['TL_LANG']['MSC']['youtube']['privacy']);
        $objTemplate->autoLabel = sprintf($objTemplate->autoLabel, \Environment::get('host'));

        return $objTemplate->parse();
    }

    protected function init()
    {
        // tl_content type youtube or addYoutube for tl_news must be set
        $blnCheck = (($this->type == 'youtube' || $this->addYouTube) && $this->youtube != '');

        // autoplay video from autoplay youtube id
        if (\Input::get('autoplay') == $this->youtube || $this->autoplay)
        {
            $this->autoplay = true;
        }

        return $blnCheck;
    }

    public function getYouTubeSrc()
    {
        if (!$this->init())
        {
            return '';
        }

        $strUrl = $this->getConfigData('youtubePrivacy') ? static::$privacyEmbedSrc : static::$defaultEmbedSrc;
        $strUrl .= $this->youtube;

        $strUrl = \HeimrichHannot\Haste\Util\Url::addQueryString('rel=' . ($this->ytShowRelated ? 1 : 0), $strUrl);
        $strUrl = \HeimrichHannot\Haste\Util\Url::addQueryString('modestbranding=' . ($this->ytModestBranding ? 1 : 0), $strUrl);
        $strUrl = \HeimrichHannot\Haste\Util\Url::addQueryString('showinfo=' . ($this->ytShowInfo ? 1 : 0), $strUrl);

        if ($this->autoplay || $this->getConfigData('autoplay'))
        {
            $strUrl = \HeimrichHannot\Haste\Util\Url::addQueryString('autoplay=1', $strUrl);
        }

        return $strUrl;
    }

    public static function getYouTubeImage($strID)
    {
        $url = '';
        $strResult = '';
        $resolution = [
            'maxresdefault',
            'sddefault',
            'mqdefault',
            'hqdefault',
            'default',
        ];

        for ($x = 0; $x < sizeof($resolution); $x++)
        {
            $url = 'http://img.youtube.com/vi/' . $strID . '/' . $resolution[$x] . '.jpg';

            if ($strResult = Curl::request($url))
            {
                break;
            }
        }

        return [$url, $strResult];
    }


    public function setData(array $arrData)
    {
        $this->arrData = $arrData;

        return $this;
    }

    public function setConfig(YouTubeSettings $objConfig)
    {
        $this->arrConfig = $objConfig->getData();

        return $this;
    }

    /**
     * Set an object property
     *
     * @param string $strKey
     * @param mixed  $varValue
     */
    public function __set($strKey, $varValue)
    {
        $this->arrData[$strKey] = $varValue;
    }


    /**
     * Return an object property
     *
     * @param string $strKey
     *
     * @return mixed
     */
    public function __get($strKey)
    {
        if (isset($this->arrData[$strKey]))
        {
            return $this->arrData[$strKey];
        }
    }


    /**
     * Check whether a property is set
     *
     * @param string $strKey
     *
     * @return boolean
     */
    public function __isset($strKey)
    {
        return isset($this->arrData[$strKey]);
    }


    public function getData()
    {
        return $this->arrData;
    }

    public function getConfig()
    {
        return $this->arrConfig;
    }

    public function getConfigData($strKey)
    {
        if (isset($this->arrConfig[$strKey]))
        {
            return $this->arrConfig[$strKey];
        }
    }
}