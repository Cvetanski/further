<?php

namespace App\Vote\Repositories;

use App\Venues\Repositories\Contracts\VenueRepositoryInterface;
use App\Vote\Repositories\Contracts\VoteRepositoryInterface;
use App\Vote\Vote;

class EloquentVoteRepository implements VoteRepositoryInterface
{
    public function all():array
    {
        return Vote::all()->all();
    }

    public function get(int $id): ?Vote
    {
        return Vote::findOrFail($id);
    }

    public  function store(Vote $vote)
    {
        $vote->save();
    }

    public function delete(Vote $vote)
    {
        $vote->delete();
    }


    public function update(Vote $vote)
    {
        $vote->save();
    }

    public function findOrFail(int $id): Vote
    {
        return Vote::findOrFail($id);
    }
}
