# YouTube

YouTube is a contao module to provide responsive youtube videos with preview images and better privacy control.
It provides support for content elements and news items.

## Technical instruction

Youtube videos can be added to news templates with ease. Just add the following code (for example: news_full.html5):

```
<?php if ($this->addYouTube): ?>
	<?= $this->youtubeVideo; ?>
<?php endif; ?>
```

## Features
 
* Responsive youtube videos (requires jQuery)
* Preview image for youtube videos
    * If no custom image is given, the preview image will be loaded from youtube and saved under 'files/media/youtube/' 
* Privacy mode (requires jQuery)
    * In privacy mode the video is displayed, after the user accepted a privacy advice within a modal prompt (requires bootstrap 3 modal window support)
    * The user can mark his selection as permanent with a checkbox (state will be saved in a cookie) 

![alt privacy modal](./docs/img/privacy_modal.jpg)
    
    
### Content elements

Name | Description
---- | -----------
ContentYoutube | The default core youtube content element with additional features. 

### Fields

tl_module:

Name | Description
---- | -----------
youtube_template | Select a youtube template within your news module.
autoplay | Start the video on page view, only for reader modules.

tl_page:[root pages only]

Name | Description
---- | -----------
youtube_template | Select a youtube template within your root page. 
youtubePrivacy | Enable youtube privacy mode for all elements on pages within this root page. 
youtubePrivacyTemplate | Select a youtube privacy template within your root page.

### Hooks

Name | Arguments | Description
---- | --------- | -----------
parseArticles | $objTemplate, $arrItem, $objModule | Add youtube to news templates.

