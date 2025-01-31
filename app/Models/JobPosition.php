<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPosition extends Model
{
    protected $guarded=[];

    /**
     * @return HasMany
     */
    public function skills():HasMany{
        return $this->hasMany(Skill::class);
    }

    /**
     * @return HasMany
     */
    public function opportunities():HasMany{
        return $this->hasMany(Opportunity::class);
    }

    /**
     * @return HasMany
     */
    public function applicant():HasMany{
        return $this->hasMany(Applicant::class);
    }
}
