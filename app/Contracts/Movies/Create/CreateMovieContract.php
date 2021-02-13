<?php

namespace App\Contracts\Movies\Create;

interface CreateMovieContract
{
    /**
     * Validate and create a movie submitted from a user.
     *
     * @param  int  $user_id the authorized user id
     * @param  array  $input the request fields with values
     * @return void
     *
     * No need for validation here
     * @see \App\Http\Requests\CreateMovieRequest
     */
    public function create(int $user_id, array $input);
}
