<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    protected $guarded=[];

    /**
     * @return BelongsTo
     */
    public function jobPosition():BelongsTo{
        return $this->belongsTo(JobPosition::class);
    }
}
