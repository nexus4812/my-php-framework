
<?php

namespace App\Library\Route;

use App\Library\Http\Controller\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class ControllerFactory
{
    /**
     * Route constructor.
     */
    public function __construct(
        private Request $request,
        private RouteCollection $routeCollection,
    )
    {
    }

    public function create(): ControllerInterface
    {
        $requestContext = new RequestContext();
        $requestContext->fromRequest($this->request);

        $matcher = new UrlMatcher($this->routeCollection, $requestContext);

        try {
            $parameters = $matcher->matchRequest($this->request);
        } catch (NoConfigurationException $e) {
            var_dump($e);
            // TODO NOT Found
        } catch (ResourceNotFoundException $e) {
            var_dump($e);
            // TODO NOT Found
        } catch (MethodNotAllowedException $e) {
            var_dump($e);
        }

        var_dump($parameters);

        return Controller;
    }
}
