Pagerfanta Adapt PHP
====================

[![CircleCI](https://circleci.com/gh/spacetab-io/pagerfanta-adapt-php/tree/master.svg?style=svg)](https://circleci.com/gh/spacetab-io/pagerfanta-adapt-php/tree/master)
[![codecov](https://codecov.io/gh/spacetab-io/pagerfanta-adapt-php/branch/master/graph/badge.svg)](https://codecov.io/gh/spacetab-io/pagerfanta-adapt-php)

This a simple adapters for [Pagerfanta](https://github.com/whiteoctober/Pagerfanta) library.

## Installation

```bash
composer install spacetab-io/pagerfanta-adapt-php
```

## Usage

Basic:
```php
use Spacetab\PagerfantaAdapt\PaginatePdoAdapter;
use Pagerfanta\Pagerfanta;

$adapter = new PaginatePdoAdapter(new PDO('dsn'), 'tableName');
$pagerfanta = new Pagerfanta($adapter);

```

## Depends

* \>= PHP 7.4
* Composer for install package

## Adapters list

*  `Spacetab\PagerfantaAdapt\BasePdoAdapter.php`
*  `Spacetab\PagerfantaAdapt\FluentPdoAdapter.php`
*  `Spacetab\PagerfantaAdapt\PaginatePdoAdapter.php`

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

