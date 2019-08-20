<?php

namespace App\Policies;

use App\User;
use App\Factura;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacturaPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin())
        {
          return true;
        }
    }

    /**
     * Determine whether the user can view any facturas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the factura.
     *
     * @param  \App\User  $user
     * @param  \App\Factura  $factura
     * @return mixed
     */
    public function view(User $user, Factura $factura)
    {
        return $user->id === $factura->car->client->user->id;
    }

    /**
     * Determine whether the user can create facturas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the factura.
     *
     * @param  \App\User  $user
     * @param  \App\Factura  $factura
     * @return mixed
     */
    public function update(User $user, Factura $factura)
    {
        //
    }

    /**
     * Determine whether the user can delete the factura.
     *
     * @param  \App\User  $user
     * @param  \App\Factura  $factura
     * @return mixed
     */
    public function delete(User $user, Factura $factura)
    {
        //
    }

    /**
     * Determine whether the user can restore the factura.
     *
     * @param  \App\User  $user
     * @param  \App\Factura  $factura
     * @return mixed
     */
    public function restore(User $user, Factura $factura)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the factura.
     *
     * @param  \App\User  $user
     * @param  \App\Factura  $factura
     * @return mixed
     */
    public function forceDelete(User $user, Factura $factura)
    {
        //
    }
}
