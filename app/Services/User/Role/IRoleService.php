<?php

namespace App\Services\User\Role;

use Spatie\Permission\Models\Role;

interface IRoleService
{
    /**
     * @param string $role
     * 
     * @return Role
     */
    public function CreateRole(string $role): Role;

    /**
     * @return array
     */
    public function GetRoles(): array;

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function DeleteRole(int $id): bool;

    /**
     * @param int $id
     * @param string $role
     * 
     * @return bool
     */
    public function UpdateRole(int $id, string $role): bool;

    /**
     * @param int $id
     * 
     * @return Role
     */
    public function GetOneRole(int $id): Role;
}