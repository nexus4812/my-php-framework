<?php declare(strict_types=1);


namespace App\Library\Database;


use Illuminate\Database\Query\Builder;

interface QueryBuilderInterface
{
    public function query(): Builder;
}
