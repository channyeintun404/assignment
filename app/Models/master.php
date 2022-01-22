<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master extends Model
{
    // use HasFactory;
       protected $fillable = [
        'external_id','name', 'is_acitve','list_order'
    ];
}
