<?php declare(strict_types=1);

namespace Spacetab\Tests;

use Spacetab\PaginateFormatter\Adapters\SqlAmphpAdapter;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Spacetab\PaginateFormatter\PaginateFormatter;
use PHPUnit\Framework\TestCase;
use stdClass;
use TypeError;
use Amp\Postgres;

class PaginateFormatterTest extends TestCase
{
    public function testConstructorMustBeToAcceptPagerfantaInstance()
    {
        $this->expectException(TypeError::class);
        $this->expectErrorMessage('must be an instance of Pagerfanta\Pagerfanta');

        new PaginateFormatter(new stdClass());
    }

    public function testFormatPaginationWithPagerfanta()
    {
        $items = [
            [1, 2, 3],
            [1, 2, 3],
            [1, 2, 3],
            [1, 2, 3],
        ];

        $formatter = new PaginateFormatter(new Pagerfanta(new ArrayAdapter($items)));
        $formatter->setMeta(['lang' => 'ru']);
        $formatter->setItems(array_map(function ($values) {
            return array_map(function ($item) {
                return $item * 2;
            }, $values);
        }, $items));

        $results = [
            'data' => [
                [2, 4, 6],
                [2, 4, 6],
                [2, 4, 6],
                [2, 4, 6],
            ],
            'meta' => [
                'lang' => 'ru',
                'pagination' => [
                    'total'        => count($items),
                    'per_page'     => 10,
                    'current_page' => 1,
                    'total_pages'  => 1,
                    'prev_page'    => null,
                    'next_page'    => null,
                ]
            ]
        ];

        $this->assertEquals($results, $formatter->format());
    }
}
