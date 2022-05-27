<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Camp extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'price',
    ];

    public function getIsRegisteredAttribute()
    {
        if (!Auth::check()) {
            return false;
        }

        return Checkout::whereCampId($this->id)
            ->whereUserId(Auth::id())
            ->exists();
    }
}
