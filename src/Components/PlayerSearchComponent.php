<?php

namespace App\Components;

use App\Repository\PlayerRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveProp;

#[AsLiveComponent('player_search')]
class PlayerSearchComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $query = '';

    public function __construct(
        private PlayerRepository $playerRepository
    ) {
    }

    public function getPlayers(): array
    {
        return $this->playerRepository->findByQuery($this->query);
    }
}