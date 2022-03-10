<?php

namespace App\Vote;

use App\Models\User;
use App\Venues\Venue;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';

    protected $fillable =[
        'venue_id',
        'user_id',
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class,'venue_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
