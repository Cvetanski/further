<?php

namespace App\Venues;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = 'venues';

    protected $fillable = [
        'id',
        'name',
        'description',
        'city',
        'reservation',
        'default_field',
        'user_id'
    ];

    public function getId()
    {
        return $this->getAttribute('id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
