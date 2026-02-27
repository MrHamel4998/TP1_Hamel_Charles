<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "daily_price",
        "category_id",
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function rentals() {
        return $this->hasMany(Rental::class);
    }

    public function sports() {
        return $this->belongsToMany(Sport::class, 'equipment_sports');
    }

}
