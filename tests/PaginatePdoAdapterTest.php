<?php declare(strict_types=1);

namespace Spacetab\Tests;

use Envms\FluentPDO\Queries\Select;
use PDO;
use PHPUnit\Framework\TestCase;
use Spacetab\PagerfantaAdapt\FluentPdoAdapter;
use Spacetab\PagerfantaAdapt\PaginatePdoAdapter;

class PaginatePdoAdapterTest extends TestCase
{
    public function testHowPaginateAdapterReturnNumberOfResults()
    {
        $stmt = $this->createMock(\PDOStatement::class);
        $stmt->expects($this->once())
             ->method('fetch')
             ->willReturn(['count' => 1]);

        $stmt->expects($this->once())
             ->method('execute')
             ->willReturn(null);

        $pdo = $this->createMock(PDO::class);
        $pdo->expects($this->once())
            ->method('prepare')
            ->willReturn($stmt);

        $adapter = new PaginatePdoAdapter($pdo, 'table');

        $this->assertSame(1, $adapter->getNbResults());
    }

    public function testHowPaginateAdapterReturnSliceOfResults()
    {
        $stmt = $this->createMock(\PDOStatement::class);
        $stmt->expects($this->once())
             ->method('fetchAll')
             ->with(PDO::FETCH_ASSOC)
             ->willReturn([]);

        $stmt->expects($this->once())
            ->method('execute')
            ->with([0, 10])
            ->willReturn(null);

        $pdo = $this->createMock(PDO::class);
        $pdo->expects($this->once())
            ->method('prepare')
            ->willReturn($stmt);

        $adapter = new PaginatePdoAdapter($pdo, 'table');

        $this->assertSame([], $adapter->getSlice(0, 10));
    }
}
