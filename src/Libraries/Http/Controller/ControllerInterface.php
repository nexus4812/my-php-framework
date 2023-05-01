<?php

namespace App\Library\Http\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ControllerInterface
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response;
}
