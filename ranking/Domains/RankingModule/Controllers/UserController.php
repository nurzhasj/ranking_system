<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    public function addToRankings(User $user, $newScore): JsonResponse
    {
        Redis::transaction(function ($redis) use ($user, $newScore) {
            $totalScore = $redis->hget("user:{$user->id}", 'totalScore') ?: 0;
            $count = $redis->hget("user:{$user->id}", 'count') ?: 0;

            // Update the total score & count.
            $totalScore += $newScore;
            $count++;

            // Calculating average score
            $averageScore = $totalScore / $count;

            $redis->hmset("user:{$user->id}", [
                'totalScore' => $totalScore,
                'count' => $count,
                'averageScore' => $averageScore,
            ]);

            $redis->zadd('ranking', $averageScore, $user->id);
        });
    }
}
