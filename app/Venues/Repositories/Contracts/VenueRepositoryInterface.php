<?php

namespace App\Venues\Repositories\Contracts;

use App\Venues\Venue;

interface VenueRepositoryInterface
{
    public function all(): array;

    public function get(int $id): ?Venue;

    public function store(Venue $venue);

    public function findOrFail(int $id): Venue;

}
