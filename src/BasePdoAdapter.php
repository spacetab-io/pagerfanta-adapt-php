<?php declare(strict_types=1);

namespace Spacetab\PagerfantaAdapt;

use Pagerfanta\Adapter\AdapterInterface;
use PDO;

abstract class BasePdoAdapter implements AdapterInterface
{
    /**
     * @var \PDO
     */
    protected PDO $pdo;

    /**
     * @var string
     */
    protected string $table;

    /**
     * PaginatePdoAdapter constructor.
     *
     * @param \PDO $pdo
     * @param string $table
     */
    public function __construct(PDO $pdo, string $table)
    {
        $this->pdo    = $pdo;
        $this->table  = $table;
    }

    /**
     * Returns the number of results.
     *
     * @return integer The number of results.
     */
    public function getNbResults()
    {
        $stmt = $this->pdo->prepare("SELECT count(1) FROM {$this->table}");
        $stmt->execute();
        $result = $stmt->fetch();

        return $result['count'] ?? 0;
    }
}
