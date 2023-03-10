<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'node',
        'email',
        'body',
    ];
}
