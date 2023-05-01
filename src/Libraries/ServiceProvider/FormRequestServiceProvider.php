<?php declare(strict_types=1);


namespace App\Library\ServiceProvider;

use App\Library\Boostrap\ServiceProviderInterface;
use App\Library\Http\Request\FormRequest;
use DI\Container;

class FormRequestServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $container): void
    {
        $formRequest = FormRequest::createFromGlobals();

        $container->set(FormRequest::class, $formRequest);
    }
}
