<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        "name",
        "description",
        "dailyPrice"
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function rentals() {
        return $this->hasMany(Rental::class);
    }

    public function sports() {
        return $this->belongsToMany(Sport::class, 'equipmentsports');
    }

}
