<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'date_of_birth', 'migraine_frequency', 'daily_migraine_frequency','cohort'];
}
