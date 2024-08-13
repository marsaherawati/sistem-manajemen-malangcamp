<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function rents()
    {
        return $this->belongsToMany(Rent::class);
    }
}
