<?php

namespace App\Venues\Commands;

use App\Venues\Repositories\Contracts\VenueRepositoryInterface;
use App\Venues\Venue;
use Illuminate\Http\Request;

class AddVenueCommand
{
    public function handle(VenueRepositoryInterface $venueRepository, Request $request)
    {
        $user = auth('sanctum')->user();

        $venue = new Venue();
        $venue->name = $request->name;
        $venue->description =  $request->description;
        $venue->city = $request->city;
        $venue->reservation = $request->reservation;
        $venue->default_field = $request->default_field;
        $venue->user_id = $user->id;

        $venueRepository->store($venue);
    }
}
