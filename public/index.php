<?php declare(strict_types=1);

use App\Library\Route\ControllerFactory;
use App\Library\ServiceProvider\App;
use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';

// Create application container
$container = App::boot();

/** @var ControllerFactory $factory */
$factory = $container->make(ControllerFactory::class);
$request = $container->make(Request::class);

$factory
    // Create controller instance
    ->create()

    // Call controller method
    ->index($request)

    // Send Http response
    ->send();
