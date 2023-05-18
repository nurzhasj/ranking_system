<?php

declare(strict_types=1);

namespace Ranking\Domains\RankingModule\Core\Handlers;

use App\Models\User;
use Illuminate\Support\Facades\Redis;
use Ranking\Domains\RankingModule\Core\DTO\AddToRankingsRequestDTO;

final class AddToRankingsHandler
{
    public function handle(AddToRankingsRequestDTO $dto): void
    {
        $user = User::where('id', $dto->userId);
        $newScore = $dto->score;

        Redis::transaction(function ($connection) use ($user, $newScore) {
            $totalScore = $connection->hget("user:{$user->id}", 'totalScore') ?: 0;
            $count = $connection->hget("user:{$user->id}", 'count') ?: 0;

            $totalScore += $newScore;
            $count++;

            // Calculation of average score
            $averageScore = $totalScore / $count;

            // Store the updated total score, count, and average score.
            $connection->hmset("user:{$user->id}", [
                'totalScore' => $totalScore,
                'count' => $count,
                'averageScore' => $averageScore,
            ]);

            // Adding the user to the ranking by average score.
            $connection->zadd('ranking', $averageScore, $user->id);
        });
    }
}
