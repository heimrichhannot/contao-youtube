# Changelog
All notable changes to this project will be documented in this file.

## [1.5.0] - 2018-09-10

### Changed
- don't add javascript and css to globals when youtube-bundle exists 

## [1.4.11] - 2018-05-25

### Fixed
- custom preview image

## [1.4.10] - 2018-03-16

### Fixed
- youtube video url did not contain `rel`, `modestbranding`, `showinfo` params

## [1.4.9] - 2018-02-13

### Updated
- README

## [1.4.8] - 2017-10-11

### Added
- format `videoDuration` if numeric to `H:i:s` or `i:s` (if less than one hour)

## [1.4.7] - 2017-10-11

### Fixed
- catch if `YoutubeVideo::getYouTubeImage` video no longer exists

## [1.4.6] - 2017-10-10

### Added
- `@media print` support

## [1.4.5] - 2017-09-26

### Changed
- `tl_news.relatedYoutubeNews` from blob to int(10)

## [1.4.4] - 2017-09-26

### Added
- `tl_news.relatedYoutubeNews` can be set within news, if set the video from the related news will be added as youtube video to the current news 

## [1.4.3] - 2017-09-26

### Changed
- play-button for preview videos now makes usage of the original youtube play button, taken from [brand resources](https://www.youtube.com/yt/about/brand-resources/)

## [1.4.2] - 2017-09-25

### Added
- `news_categories` support, run  youtube `parseArticles` hook after `news_categories` `parseArticles` hook

## [1.4.1] - 2017-09-05

### Fixed
- Contao 4 incompatibilities

## [1.4.0] - 2017-09-05

### Added
- Contao 4 support

## [1.3.17] - 2017-07-18

### Fixed
- exceptions thrown if no api key was provided within `tl_settings`

## [1.3.16] - 2017-07-06

### Added
- `youtube_template` to `tl_content` to make youtube_template able to override

## [1.3.15] - 2017-05-05

### Added
- flag "skipImageCaching" for using the remote youtube image

## [1.3.14] - 2017-03-13

### Fixed
- tl_settings palette handling
- cache for youtube preview images

## [1.3.13] - 2017-02-17

### Fixed
- thumbnails are now loaded over YouTube API, API key now needed therefore

## [1.3.12] - 2017-02-17

### Fixed
- thumbnails are now loaded over YouTube API, API key now needed therefore

## [1.3.11] - 2017-02-16

### Fixed
- videos can now also be retrieved asyncronously (click handler fires correctly now)

## [1.3.10] - 2017-02-16

### Changed
- iframes are never loaded directly from now on for performance and privacy reasons
- changed array syntax
