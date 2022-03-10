<?php

namespace App\Vote\Commands;

use App\Venues\Venue;
use App\Vote\Repositories\Contracts\VoteRepositoryInterface;
use App\Vote\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VoteCommand
{
    public function handle(VoteRepositoryInterface $voteRepository, Request $request)
    {
        $user = auth('sanctum')->user();

        $vote = new Vote();
        $vote->user_id = $user->id;
        $vote->venue_id =  $request->venue_id;

        $voteRepository->store($vote);
    }
}
