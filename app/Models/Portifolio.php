<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portifolio extends Model
{
    use HasFactory;
    protected $fillable= [
        'user_id',
        'baptism_cert',
        'BST_cert',
        'rec_letter',
    ];
}
