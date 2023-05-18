<?php

declare(strict_types=1);

namespace Ranking\Domains\RankingModule\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Ranking\Domains\RankingModule\Core\Handlers\SendNotificationHandler;
use Ranking\Domains\RankingModule\Requests\SendNotificationRequest;

final class NotificationController extends Controller
{
    public function send(SendNotificationRequest $request, SendNotificationHandler $handler): JsonResponse
    {
        $handler->handle($request->getDto());

        return $this->response(
            message: 'Notification sent successfully !',
            data: [],
        );
    }
}
