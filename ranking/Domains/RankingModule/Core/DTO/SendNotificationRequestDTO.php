<?php

declare(strict_types=1);

namespace Ranking\Domains\RankingModule\Core\DTO;

final class SendNotificationRequestDTO
{
    public function __construct(
       public int $userId,
       public string $message
    ){
    }
}
