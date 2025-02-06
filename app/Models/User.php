<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function feedbacks() : HasMany {
        return $this->hasMany(Feedback::class);
    }
}
