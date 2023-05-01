<?php declare(strict_types=1);


namespace App\Library\Database;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Capsule\Manager as IlluminateDatabase;

class QueryBuilder implements QueryBuilderInterface
{
    public function query(): Builder
    {
        return IlluminateDatabase::connection()->query();
    }
}
