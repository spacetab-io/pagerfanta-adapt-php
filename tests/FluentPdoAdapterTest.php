<?php declare(strict_types=1);

namespace Spacetab\Tests;

use Envms\FluentPDO\Queries\Select;
use PHPUnit\Framework\TestCase;
use Spacetab\PagerfantaAdapt\FluentPdoAdapter;

class FluentPdoAdapterTest extends TestCase
{
    public function testHowFluentAdapterReturnNumberOfResults()
    {
        $mock = $this->createMock(Select::class);
        $mock->expects($this->once())
            ->method('count')
            ->willReturn(1);

        $adapter = new FluentPdoAdapter($mock);

        $this->assertSame(1, $adapter->getNbResults());
    }
}
