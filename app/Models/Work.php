<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'company_name', 'position', 'start_year', 'end_year'];

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
}
