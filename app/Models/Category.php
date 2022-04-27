<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;

class Category extends Model
{
    use HasFactory;

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
