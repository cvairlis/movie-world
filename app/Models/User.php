<?php

namespace App\Models;

use App\Models\Votes\Vote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The votes relation
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * The scope with votes relation
     * To retrieve sth like the following for each user:
     *  "liked" => "1",
     *  "hated" => "0",
     *  "loved" => "0"
     */
    public function scopeWithVotes(Builder $query)
    {
        $query->leftJoinSub(
            'SELECT movie_id, liked, hated, loved from votes',
            'votes',
            'votes.movie_id',
            'users.id'
        );
    }
}
