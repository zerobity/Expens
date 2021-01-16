<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    
    public function Lines()
    {
        return $this->hasMany(Stock::class);
    }
}
