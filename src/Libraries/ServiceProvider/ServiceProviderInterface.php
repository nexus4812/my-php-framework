<?php declare(strict_types=1);


namespace App\Library\ServiceProvider;


use DI\Container;

interface ServiceProviderInterface
{
    /**
     * Bootstrap the given application.
     *
     * @param Container $container
     */
    public function register(Container $container) :void;
}
