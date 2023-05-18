<?php

declare(strict_types=1);

namespace Ranking\Domains\RankingModule\Core\Handlers;

use App\Jobs\SendPushNotification;
use App\Models\User;
use Ranking\Domains\RankingModule\Core\DTO\SendNotificationRequestDTO;

final class SendNotificationHandler
{
    public function handle(SendNotificationRequestDTO $dto): void
    {
        $details = [
            'email' => User::where('id', $dto->userId)->firstOrFail()->email,
            'message' => $dto->message,
        ];

        dispatch(new SendPushNotification($details));
    }
}
