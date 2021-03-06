<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;

class Ingredient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
