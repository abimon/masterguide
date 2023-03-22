<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_title',
        'attendee',
        'contact',
        'email',
        'institution',
        'idno'
    ];
}
