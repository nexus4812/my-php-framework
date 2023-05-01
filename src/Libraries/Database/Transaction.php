<?php

declare(strict_types=1);

namespace App\Library\Database;

use Illuminate\Database\Capsule\Manager as IlluminateDatabase;

class Transaction implements TransactionInterface
{
    /**
     * @throws \Throwable
     */
    public function beginTransaction(): void
    {
        IlluminateDatabase::connection()->beginTransaction();
    }

    /**
     * @throws \Throwable
     */
    public function commit(): void
    {
        IlluminateDatabase::connection()->commit();
    }

    /**
     * @param int|null $toLevel
     * @throws \Throwable
     */
    public function rollBack(int $toLevel = null): void
    {
        IlluminateDatabase::connection()->rollBack($toLevel);
    }
}
