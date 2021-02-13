<?php

namespace App\Actions\Movies\Create;

use App\Contracts\Movies\Create\CreateMovieContract;
use Illuminate\Database\Eloquent\Model;

class CreateMovieAction implements CreateMovieContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

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
    public function create(int $user_id, array $input)
    {
        $this->model->create(array_merge($input, ['user_id' => $user_id]));
    }
}
