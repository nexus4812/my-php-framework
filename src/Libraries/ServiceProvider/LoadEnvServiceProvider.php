<?php declare(strict_types=1);


namespace App\Library\ServiceProvider;

use DI\Container;
use Dotenv\Dotenv;

class LoadEnvServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $container): void
    {
        if (getenv('APP_ENV') !== false) {
            return;
        }

        $dotenv = Dotenv::createImmutable(__DIR__. '/.env');
        $dotenv->load();

        $container->set(Dotenv::class, $dotenv);
    }
}
