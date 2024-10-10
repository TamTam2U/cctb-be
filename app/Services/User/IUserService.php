<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserService
{

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * 
     * @return User
     */
    public function CreateUser(string $name, string $email, string $password): User;

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * 
     * @return bool
     */
    public function UpdateUser(int $id, string $name, string $email): bool;

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function DeleteUser(int $id): bool;

    /**
     * @return array
     */
    public function GetUsers(): Collection;

    /**
     * @param int $id
     * 
     * @return User
     */
    public function GetOneUser(int $id): User;
}
