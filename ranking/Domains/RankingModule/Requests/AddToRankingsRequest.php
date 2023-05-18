<?php

declare(strict_types=1);

namespace Ranking\Domains\RankingModule\Requests;

use Illuminate\Support\Arr;
use Ranking\Domains\RankingModule\Core\DTO\AddToRankingsRequestDTO;
use Ranking\Support\Requests\BaseFormRequest;

final class AddToRankingsRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|int',
            'score' => 'required|numeric|between:0.0,5.0',
        ];
    }

    public function getDto(): AddToRankingsRequestDTO
    {
        $validated = $this->validated();

        return new AddToRankingsRequestDTO(
            userId: (int) Arr::get($validated, 'user_id'),
            score: (int) Arr::get($validated, 'score')
        );
    }
}
