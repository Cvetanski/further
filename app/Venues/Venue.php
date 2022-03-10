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

    public function jsonSerialize(): array
    {
        if ($this->default_field != null)
        {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'city'=>$this->city,
            'reservation'=>$this->reservation,
            'default_field'=>$this->default_field,
            'Added By'=>$this->user()->get(['name','surname']),
        ];
        }else{
            return [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                'city'=>$this->city,
                'reservation'=>$this->reservation,
                'Added By'=>$this->user()->get(['name','surname']),
            ];
        }
    }
}
