<?php

declare(strict_types=1);

namespace Ranking\Domains\RankingModule\Requests;

use Illuminate\Support\Arr;
use Ranking\Domains\RankingModule\Core\DTO\SendNotificationRequestDTO;
use Ranking\Support\Requests\BaseFormRequest;

final class SendNotificationRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ];
    }

    public function getDto(): SendNotificationRequestDTO
    {
        $validated = $this->validated();

        return new SendNotificationRequestDTO(
            userId: (int) Arr::get($validated, 'user_id'),
            message: Arr::get($validated, 'message')
        );
    }
}
