<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'id');
    }
}
