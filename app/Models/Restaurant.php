<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_name',
        'address',
        'image',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function dishes() {
        return $this->hasMany(Dish::class);
    }

    public function types() {
        return $this->belongsToMany(Type::class);
    }
}
