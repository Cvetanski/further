<?php

namespace App\Vote\Commands;

use App\Vote\Repositories\Contracts\VoteRepositoryInterface;
use Illuminate\Http\Request;

class EditVoteCommand
{
    private $id;

    public function __construct(int $id)
    {
        $this->id=$id;
    }

    public function handle(VoteRepositoryInterface $voteRepository, Request $request)
    {
        $user = auth('sanctum')->user();

        $vote = $voteRepository->findOrFail($this->id);

        $vote->venue_id = $request->venue_id;
        $vote->user_id = $user->id;

        $voteRepository->update($vote);
    }
}
