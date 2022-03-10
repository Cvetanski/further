<?php

namespace App\Vote\Repositories\Contracts;

use App\Vote\Vote;

interface VoteRepositoryInterface
{
    public function all(): array;

    public function get(int $id): ?Vote;

    public function store(Vote $vote);

    public function update(Vote $vote);

    public function findOrFail(int $id): Vote;
}
