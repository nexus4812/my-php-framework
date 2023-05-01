<?php

trait Twig
{
    public function twig()
    {
        $loader = new \Twig\Loader\ArrayLoader([
            'index' => 'Hello {{ name }}!',
        ]);
        $twig = new \Twig\Environment($loader);

        echo $twig->render('index', ['name' => 'Fabien']);
    }
}
