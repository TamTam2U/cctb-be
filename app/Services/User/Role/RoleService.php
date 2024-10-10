<?php

namespace App\Services\User\Role;

use Spatie\Permission\Models\Role;

class RoleService implements IRoleService
{
    /**
     * @param string $role
     * 
     * @return Role
     */
    public function CreateRole(string $role): Role
    {
        $newRole = Role::create(['name' => $role]);
        return $newRole;
    }

    /**
     * @return array
     */
    public function GetRoles(): array
    {
        $roles = Role::all();
        return $roles->toArray();
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function DeleteRole(int $id): bool
    {
        $role = Role::where('id', $id)->first();
        if (!$role) {
            return false;
        }
        $role->delete();
        return true;
    }

    /**
     * @param int $id
     * @param string $role
     * 
     * @return bool
     */
    public function UpdateRole(int $id, string $role): bool
    {
        $role = Role::where('id', $id)->first();
        if (!$role) {
            return false;
        }
        $role->name = $role;
        $role->save();
        return true;
    }

    /**
     * @param int $id
     * 
     * @return Role
     */
    public function GetOneRole(int $id): Role
    {
        $role = Role::where('id', $id)->first();
        return $role;
    }
}
