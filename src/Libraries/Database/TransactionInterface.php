<?php declare(strict_types=1);


namespace App\Library\Database;


interface TransactionInterface
{
    public function beginTransaction(): void;

    public function commit(): void;

    public function rollBack(int $toLevel = null): void;
}
