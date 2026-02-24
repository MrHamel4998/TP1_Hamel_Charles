<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        "rating",
        "comment"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function rental() {
        return $this->belongsTo(Rental::class);
    }
}
