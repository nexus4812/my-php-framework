<?php


namespace App\Library\Boostrap;


use DI\Container;
use Symfony\Component\Routing\RouteCollection;

class RouteCollectionServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        $routeCollection = new RouteCollection();

        $container->set(RouteCollection::class, $routeCollection);
    }
}
