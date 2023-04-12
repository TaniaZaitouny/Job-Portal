<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    use HasFactory;

    public function company() {
        return $this->belongsTo(User::class, 'id');
    }

    public function applications() {
        return $this->hasMany(Application::class);
    }

    public function savedBy() {
        return $this->hasMany(SavedJob::class);
    }

    public function isSaved() {
        $user = Auth::user();
        if ($user) {
            $savedJob =  SavedJob::where('user_id', $user->id)->where('job_id', $this->id)->first();
            return $savedJob ? true : false;
        } else {
            return false;
        }
    }

}
