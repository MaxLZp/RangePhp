# Range (aka Interval)

May be used instead of pair of values.
[More about interval](https://en.wikipedia.org/wiki/Interval_%28mathematics%29)

## Installation

Use composer

```bash
composer require maxlzp/range
```

## Usage
 - [Create range](#Create-range)
 - [Retrieve range margins](#Retrieve-range-margins)
 - [Some features](#Some-features)

##### Create range
```php
$range = Range::between($start, $end);
$range = Range::betweenOpen($start, $end);
$range = Range::betweenLeftOpen($start, $end);
$range = Range::betweenRightOpen($start, $end);
$range = Range::greaterThan($value);
$range = Range::greaterOrEqualThan($value);
$range = Range::lessThan($value);
$range = Range::lessOrEqualThan($value);
```

##### Retrieve range properties
```php
$left = $range->getLeft();
$right = $range->getRight();
$isEmpty = $range->isEmpty();
$width = $range->getWidth();
```


##### Some features
```php
$gap = $range->gap($otherRange); //Gap between two ranges
$includes = $range->includes($otherRange); //Check if the range includes other range completely
$includesValue = $range->includesValue($value); //Check if the value lays within the range
$split = $range->splitAt($value); //Split the range into two ranges
$touches = $range->touches($otherRange); //Check if ranges are touching one another