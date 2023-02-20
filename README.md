# php-exec-measure
## About
A library in PHP which can measure time consumption for PHP operations.
## Requirements
Minimum `php8.0`
## Installation with Composer
`composer require nsommer89/php-exec-measure`

.. or github page: https://github.com/nsommer89/php-exec-measure

## Library usage

##### Basic usage example
```
<?php

require_once __DIR__ . '/path/to/autoload.php';

$measurement = new \Nsommer89\PhpExecMeasure\SimpleMeasurement();

($measurement)->fn(function () {
    // .. the code you want to measure time consumption
});

foreach ($measurement->getResult()->toArray() as $key => $value) {
  echo $key . ': ' . $value . PHP_EOL;
}
```
##### Example result
```
milliseconds: 26.175975799560547
microseconds: 26175.975799560547
seconds: 0.026175975799560547
start: 1676922692.509042
end: 1676922692.535218
start_unixtime: 1676922692
end_unixtime: 1676922692
```

#### Other formats

##### JSON
```
...
$resultJson = $measurement->getResult()->toJson();
...
```

#### Get the values
```
...
$result = $measurement->getResult();

$seconds = $result->seconds();
$milliseconds = $result->milliseconds();
$microseconds = $result->microseconds();
...
```

## CLI usage

Measure PHP file execution:
```
$ ./vendor/bin/php-exec-measure -f <filename>.php
```

Output as JSON:
```
$ ./vendor/bin/php-exec-measure -f <filename>.php --json
```

JSON result:
```
{"milliseconds":26.175975799560547,"microseconds":26175.975799560547,"seconds":0.026175975799560547,"start":1676922692.509042,"end":1676922692.535218,"start_unixtime":1676922692,"end_unixtime":1676922692}
```

Ignore errors:
```
$ ./vendor/bin/php-exec-measure -f <filename>.php --json --ignore-errors
```

Log output to file:
```
$ ./vendor/bin/php-exec-measure -f <filename>.php -o
```

Specify a log output file name:
```
$ ./vendor/bin/php-exec-measure -f <filename>.php --output <log file name>.log
```

 - `-f <file path>` is the only required arguments
 - `<filename>.php` will always be relative to project path

Made with ♡ by nsommer89