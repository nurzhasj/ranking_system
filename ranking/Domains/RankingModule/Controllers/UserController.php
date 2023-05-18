<?php

declare(strict_types=1);

namespace Ranking\Domains\RankingModule\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Ranking\Domains\RankingModule\Core\Handlers\AddToRankingsHandler;
use Ranking\Domains\RankingModule\Requests\AddToRankingsRequest;
use Symfony\Component\HttpFoundation\Response;

final class UserController extends Controller
{
    public function addToRankings(AddToRankingsRequest $request, AddToRankingsHandler $handler): JsonResponse
    {
        $handler->handle($request->getDto());

        $this->response(
            message: 'Score was added successfully',
            data: [],
            code: Response::HTTP_CREATED
        );
    }
}
