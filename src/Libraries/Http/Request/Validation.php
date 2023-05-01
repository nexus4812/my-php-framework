<?php declare(strict_types=1);
namespace App\Library\Http\Request;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

class Validation
{
    public static function createFactory(): Factory
    {
        $fileLoader = new FileLoader(new Filesystem(), '');
        $translator = new Translator($fileLoader, 'en_US');
        return new Factory($translator);
    }
}
