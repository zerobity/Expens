<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';

    public function products()
    {
        return $this->hasOne(Product::class);
    }
}
