<?php

namespace App\Http\Controllers\Vote;

use App\Http\Controllers\Controller;
use App\Venues\Venue;
use App\Vote\Commands\EditVoteCommand;
use App\Vote\Commands\VoteCommand;
use App\Vote\Repositories\Contracts\VoteRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        try{
            $user = auth('sanctum')->user();
            $venue = Venue::whereBetween('updated_at',[Carbon::parse('last friday')->startOfDay(),Carbon::parse('next friday')->endOfDay()])
                ->where('id',$request->venue_id)->first();

            if($user->venue || $user->vote || !$venue ){
                return response()->json([
                    'error' => false,
                    'message' => 'You have already voted or the venue is from past week'
                ]);
            }
            else{
                $request->validate([
                    'venue_id'=>'required',
                ]);

                dispatch_now(new VoteCommand());
            }

        }catch(\Exception $e){
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'error' => false,
            'message' => 'You Successfully vote'
        ]);
    }

    public function update(Request $request, $id)
    {
        try{
        $user = auth('sanctum')->user();
        $venue = Venue::whereBetween('updated_at',[Carbon::parse('last friday')->startOfDay(),Carbon::parse('next friday')->endOfDay()])
            ->where('id',$request->venue_id)->first();

            if(!$user->venue  && $venue != null){
                $request->validate([
                    'venue_id'=>'required',
                ]);

                dispatch_now(new EditVoteCommand($id));
            }else{
                return response()->json([
                    'error' => false,
                    'message' => 'You have already voted or the venue is from past week'
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
            'message' => 'You Successfully vote'
        ]);
    }
}
