<?php

declare(strict_types=1);

namespace Ranking\Support\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest
{
    abstract public function rules(): array;

    public function authorize(): bool
    {
        return true;
    }
}
