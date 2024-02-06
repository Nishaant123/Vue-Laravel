<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfForm extends Model
{
    use HasFactory;
    protected $fillable=['userName','userAge','referrer','interest','how','image','document'];
}
