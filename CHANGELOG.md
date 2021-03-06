# ChangeLog

## 3.3.4

### Fixed
- Fixed broken test.

## 3.3.3

### Fixed
- Refactored System/Session and System/Token to extend corex/session instead of having redundant code.


## 3.3.2

### Fixed
- Refactored System/Cache, System/Directory and System/File to extend corex/filesystem instead of having redundant code.


## 3.3.1

### Fixed
- Refactored Arr, Bag, Obj, Str and StrList to extend corex/helpers instead of having redundant code.


## 3.3.0

### Added
- Added Obj::getConstants().


## 3.2.5

### Fixed
- Fixed Countable problem.
- Updated phpunit config-file.


## 3.2.4

### Fixed
- Refactored getting headers and check for header.


## 3.2.3

### Fixed
- Refactored System/Input::getHeader() to be more accurate.


## 3.2.2

### Fixed
- Fixed System/Input::getHeaders() to create base-function getallheaders() if not found.


## 3.2.1

## Fixed
- Removed array declaration on Arr::indexOf() for broader usage.
- Removed array declaration on Arr::pluck() for broader usage.


## 3.2.0

### Added
- Added Obj::hasMethod().


## 3.1.0

### Added
- Added Str::strpos().
- Added Str::indexOf().
- Added Str::contains().


## 3.0.1

### Fixed
- System/Input::getHost() now supports gethostname() if not set.
- Updated System/Input to handle server entries not set.


## 3.0.0
This release breaks code.

### Added
- Obj->getExtends() added.
- Obj->hasExtends() added.
- Arr::toArray() added.
- Arr::has() added.
- Arr::remove() added.
- Arr::toJson() added.
- System/Input::getUri() added.
- System/Input::getPort() added.
- System/Input::getQueryString() added.
- System/Input::getAuthUsername() added.
- System/Input::getAuthPassword() added.
- System/Input::getStandardPort() added.
- Bag->keys() added.
- Bag->prepareKey() added as protected to support changing key.

### Changed
- php 7 required.
- Class Code/Convention merged into class Str.
- Class Properties renamed and moved to Base/BaseProperties to have better structure.
- It is now possible to parse both object and class in Obj methods.
- Path::root() now supports both array and string (dot notation supported).
- Path::packageCurrent() now supports both array and string (dot notation supported).
- Path::package() now supports both array and string (dot notation supported).
- Class Container renamed to Bag.
- Bag->toArray() renamed to Bag->all().
- System/Input::getProtocol() renamed to getScheme() and updated to handle REQUEST_SCHEME.
- System/Input::getRemoteAddress() renamed to getRemoteIp().
- System/Input::getUri() updated to not return port if standard port.

### Removed
- Class Messages removed.
- Class Config removed in favor of package corex/config.
- Class System/Template removed.
