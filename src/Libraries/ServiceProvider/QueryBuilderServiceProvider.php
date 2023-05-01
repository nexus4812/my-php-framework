<?php declare(strict_types=1);


namespace App\Library\ServiceProvider;

use App\Library\Boostrap\ServiceProviderInterface;
use App\Library\Database\Transaction;
use App\Library\Database\TransactionInterface;
use Illuminate\Database\Capsule\Manager;

use DI\Container;
use function DI\autowire;

class QueryBuilderServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $container): void
    {
        $capsule = new Manager();

        $capsule->addConnection([
            'driver' => getenv('DB_CONNECTION'),
            'host' => getenv('DB_HOST'),
            'database' => getenv('DB_DATABASE'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();

        $container->set(
            TransactionInterface::class,
            autowire(Transaction::class)
        );
    }
}
