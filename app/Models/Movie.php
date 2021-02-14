<?php

namespace App\Models;

use App\Traits\Votable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory, Votable;

    protected $attributes = [
        'likes' => 0,
        'hates' => 0,
        'loves' => 0,
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'movies';

    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Get the movie created at date in human readable format.
     *
     * @param  string  $value
     */
    public function getCreatedAtAttribute($value) : string
    {
        return Carbon::parse($value)->format('d M Y');
    }

    /**
     * The user that created this movie record
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
