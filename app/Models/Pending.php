<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pending extends Model
{
    protected $fillable = ['machine_id', 'line', 'status'];
}
