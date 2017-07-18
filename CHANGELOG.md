# Changelog
All notable changes to this project will be documented in this file.

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
