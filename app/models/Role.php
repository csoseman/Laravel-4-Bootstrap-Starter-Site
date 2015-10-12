<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

    /**
     * Provide an array of strings that map to valid roles.
     * @param array $roles
     * @return stdClass
     */
    public function validateRoles( array $roles )
    {
        $user = Confide::user();
        $roleValidation = new stdClass();
        foreach( $roles as $role )
        {
            // Make sure theres a valid user, then check role.
            $roleValidation->$role = ( empty($user) ? false : $user->hasRole($role) );
        }
        return $roleValidation;
    }

    public function perms()
    {
        return $this->belongsToMany('Permission', Config::get('entrust::permission_role_table'));
    }

    public function users()
    {
        return $this->belongsToMany('User', Config::get('entrust::assigned_roles_table'));
    }
}