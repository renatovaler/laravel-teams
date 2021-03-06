<?php

namespace Datashaman\Teams\Policies;

use Datashaman\Teams\Contracts\TeamInterface;
use Datashaman\Teams\TeamsUserInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class AbstractPolicy
{
    use HandlesAuthorization;

    /**
     * @param TeamsUserInterface $actingUser
     * @param string $ability
     */
    public function before(TeamsUserInterface $actingUser, string $ability)
    {
        if ($actingUser->hasRole('ADMIN')) {
            return true;
        }
    }

    /**
     * @param TeamsUserInterface $actingUser
     * @param TeamInterface $team
     *
     * @return bool
     */
    protected function userIsInTeam(TeamsUserInterface $user, TeamInterface $team): bool
    {
        return $user
            ->teams()
            ->where('teams.id', $team->id)
            ->exists();
    }
}
