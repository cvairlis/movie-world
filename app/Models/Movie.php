<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
