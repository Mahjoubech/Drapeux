<?php

namespace App\Policies;

use App\Models\Country;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CountryPolicy
{

    public function modify(User $user, Country $country): Response
    {
        return $user->id === $country->user_id ? Response::allow() : Response::deny('You do not access on this country');
    }
}
