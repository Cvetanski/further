<?php

namespace App\Venues\Repositories;

use App\Venues\Repositories\Contracts\VenueRepositoryInterface;
use App\Venues\Venue;

class EloquentVenueRepository implements VenueRepositoryInterface
{
    public function all():array
    {
        return Venue::all()->all();
    }

    public function get($id): ?Venue
    {
        return Venue::findOrFail($id);
    }

    public  function store(Venue $venue)
    {
        $venue->save();
    }

    public function delete(Venue $venue)
    {
        $venue->delete();
    }

    public function update(Venue $venue)
    {
        $venue->save();
    }

    public function findOrFail(int $id): Venue
    {
        return Venue::findOrFail($id);
    }
}
