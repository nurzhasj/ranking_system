<?php

declare(strict_types=1);

namespace App\Http\Requests;

final class AddToRankingsRequestDTO
{
    public function __construct(
        public int $userId,
        public int $score
    ){
    }
}
