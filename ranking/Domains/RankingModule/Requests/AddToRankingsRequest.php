<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Pms\Support\Requests\BaseFormRequest;

final class AddToRankingsRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|int',
            'score' => 'required|int',
        ];
    }
}
