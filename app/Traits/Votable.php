<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Votes\Vote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Votable
{
    /**
     * The votes relation
     */
    public function votes() : HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * A vote relation.
     *
     * It is not a good idea to work with boolean parameters here,
     * but I will leave it as it is unless I will expose this through an API or sth like else.
     */
    private function vote($user = null, bool $like, bool $hate, bool $love)
    {
        $this->votes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'liked' => $like,
            'hated' => $hate,
            'loved' => $love
        ]);
    }

    /**
    * A like relation.
    */
    public function like($user = null)
    {
        $this->vote($user, true, false, false);
    }

    /**
     * A hate relation.
     */
    public function hate($user = null)
    {
        $this->vote($user, false, true, false);
    }

    /**
     * A love relation.
     */
    public function love($user = null)
    {
        $this->vote($user, false, false, true);
    }

    /**
     * The is liked by relation
     */
    public function isLikedBy(User $user) : bool
    {
        return (bool) $user->votes->where('movie_id', $this->id)->where('liked', true)->count();
    }

    /**
     * The is hated by relation
     */
    public function isHatedBy(User $user) : bool
    {
        return (bool) $user->votes->where('movie_id', $this->id)->where('hated', true)->count();
    }

    /**
     * The is loved by relation
     */
    public function isLovedBy(User $user) : bool
    {
        return (bool) $user->votes->where('movie_id', $this->id)->where('loved', true)->count();
    }

    /**
     * The scope with votes relation
     * To retrieve sth like the following for each movie:
     *  "likes" => "1",
     *  "hates" => "1",
     *  "loves" => "0"
     */
    public function scopeWithVotes(Builder $query)
    {
        $query->leftJoinSub(
            'SELECT movie_id, sum(liked) as likes, sum(hated) as hates, sum(loved) as loves from votes group by movie_id',
            'votes',
            'votes.movie_id',
            'movies.id'
        );
    }
}
