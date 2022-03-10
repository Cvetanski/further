<?php

namespace App\Venues\Repositories;

use App\Venues\Repositories\Contracts\VenueRepositoryInterface;
use App\Venues\Venue;
use Illuminate\Support\Carbon;

class EloquentVenueRepository implements VenueRepositoryInterface
{
    public function all():array
    {
        return Venue::all()->all();
    }

    public function allBetweenFridays(): array
    {
       return Venue::all()->whereBetween('updated_at',[Carbon::parse('last friday')->startOfDay(),Carbon::parse('next friday')->endOfDay()])->all();
    }

    public  function store(Venue $venue)
    {
        $venue->save();
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
