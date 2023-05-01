<?php declare(strict_types=1);


namespace App\Library\ServiceProvider;


use App\Library\Boostrap\ServiceProviderInterface;
use DI\Container;
use DI\ContainerBuilder;

class App
{
    /**
     * @var array<int, class-string>
     */
    protected static array $serviceProviders = [
        LoadEnvServiceProvider::class,
        QueryBuilderServiceProvider::class,
    ];

    public static function boot(): Container
    {
        $container = (new ContainerBuilder())->build();

        /** @var ServiceProviderInterface $serviceProvider */
        foreach (self::$serviceProviders as $serviceProvider) {
            $serviceProvider->register($container);
        }

        return $container;
    }
}
