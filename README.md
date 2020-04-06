Paginate Formatter For PHP
==========================

[![CircleCI](https://circleci.com/gh/spacetab-io/paginate-php/tree/master.svg?style=svg)](https://circleci.com/gh/spacetab-io/paginate-php/tree/master)
[![codecov](https://codecov.io/gh/spacetab-io/paginate-php/branch/master/graph/badge.svg)](https://codecov.io/gh/spacetab-io/paginate-php)

This a simple formatter based on [Pagerfanta](https://github.com/whiteoctober/Pagerfanta) library.
Specially created for follow up corporate standards of pagination format.

## Installation

```bash
composer install spacetab-io/paginate-php
```

## Usage

Basic:
```php
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Spacetab\PaginateFormatter\PaginateFormatter;

$adapter = new ArrayAdapter($array);
$pagerfanta = new Pagerfanta($adapter);
$paginate = new PaginateFormatter($pagerfanta);

$paginate->format(); // returns formatted output.
```

Replace current page results from Pagerfanta:
```php
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Spacetab\PaginateFormatter\PaginateFormatter;

$adapter = new ArrayAdapter($array);
$pagerfanta = new Pagerfanta($adapter);
$paginate = new PaginateFormatter($pagerfanta);

$paginate->setItems($transformedModel)->format();
```

## Depends

* \>= PHP 7.1
* Composer for install package

## Additional adapters

This package also add a new following adapters:

*  `Spacetab\PaginateFormatter\Adapters\BasePdoAdapter.php`
*  `Spacetab\PaginateFormatter\Adapters\FluentPdoAdapter.php`
*  `Spacetab\PaginateFormatter\Adapters\PaginatePdoAdapter.php`

## Output format

```json
{
  "data": [{"foo": "bar"}],
  "meta": {
    "pagination": {
      "total": 6,
      "per_page": 1,
      "current_page": 1,
      "total_pages": 6,
      "prev_page": null,
      "next_page": 2
    }
  }
}
```

## License

The MIT License

Copyright © 2020 spacetab.io, Inc. https://spacetab.io

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

