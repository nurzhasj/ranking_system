<?php

declare(strict_types=1);

namespace Ranking\Domains\RankingModule\Core\DTO;

final class AddToRankingsRequestDTO
{
    public function __construct(
        public int $userId,
        public int $score
    ){
    }
}
