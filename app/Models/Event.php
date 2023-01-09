<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'event_title',
        'event_description',
        'event_time',
        'event_date',
        'event_duration',
        'isPublic',
        'user_id'
    ];
}
