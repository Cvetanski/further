<?php

namespace App\Http\Controllers\Venue;

use App\Http\Controllers\Controller;
use App\Venues\Commands\AddVenueCommand;
use App\Venues\Repositories\Contracts\VenueRepositoryInterface;
use App\Venues\Venue;
use App\Vote\Commands\VoteCommand;
use App\Vote\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VenueController extends Controller
{
    public function index(VenueRepositoryInterface  $venueRepository)
    {
        return response()->json([
            'message' => 'Here is the all Venues',
            $venueRepository->allBetweenFridays()
        ]);
    }

    public function store(Request $request)
    {
        try{
            $user = auth('sanctum')->user();

            if(!$user->venue  && !$user->vote ){
                $request->validate([
                    'name'=>'required|string',
                    'description'=>'string',
                    'reservation'=>'string',
                    'city'=>'string',
                    'default_field'=>'string',
                ]);

                dispatch_now(new AddVenueCommand());

                $vote = new Vote();
                $venue = Venue::where('user_id',$user->id)->get()->first();
                $vote->user_id = $user->id;
                $vote->venue_id = $venue->id;

                $vote->save();
            }
            else{
                return response()->json([
                    'message' => 'You have already voted'
                ]);
            }


        }catch(\Exception $e){
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'error' => false,
            'message' => 'You Successfully added venue'
        ]);
    }
}
