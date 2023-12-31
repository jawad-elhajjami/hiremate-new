<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOfferPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'salary',
        'country_id',
        'city_id',
        'flexibility',
        'requestedContract',
        'required_experience'
    ];
    
}