<?php declare(strict_types=1);

namespace App\Library\Http\Request;

use Illuminate\Support\Arr;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

abstract class FormRequest extends SymfonyRequest
{
    /**
     * @param string|null $keys
     * @return array
     */
    public function all(string $keys = null): array
    {
        // $input = array_replace_recursive($this->input(), $this->allFiles());
        $input = array_replace_recursive($this->input());

        if (! $keys) {
            return $input;
        }

        $results = [];

        foreach (\is_array($keys) ? $keys : \func_get_args() as $key) {
            Arr::set($results, $key, Arr::get($input, $key));
        }

        return $results;
    }

    /**
     * Retrieve an input item from the request.
     *
     * @param  string|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function input($key = null, $default = null): mixed
    {
        return data_get(
            $this->getInputSource()->all() + $this->query->all(), $key, $default
        );
    }

    /**
     * Get the input source for the request.
     *
     * @return ParameterBag
     */
    protected function getInputSource(): ParameterBag
    {
        // if ($this->isJson()) {
        //     return $this->json();
        // }

        return \in_array($this->getRealMethod(), ['GET', 'HEAD'], true) ? $this->query : $this->request;
    }

    public function validator(): Validator
    {
        return Validation::createFactory()->make(
            $this->all(),
            $this->rules(),
            $this->messages(),
            $this->attributes(),
        );
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    protected function messages(): array
    {
        return [];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    protected function attributes(): array
    {
        return [];
    }

    /**
     * Get custom rules for validator errors.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [];
    }
}
