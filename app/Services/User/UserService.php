<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService implements IUserService
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * 
     * @return User
     */
    public function CreateUser(string $name, string $email, string $password): User
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();

        return $user;
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * 
     * @return bool
     */
    public function UpdateUser(int $id, string $name, string $email): bool
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            return false;
        }
        $user->name = $name;
        $user->email = $email;
        $user->save();
        return true;
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function DeleteUser(int $id): bool
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            return false;
        }
        $user->delete();
        return true;
    }

    /**
     * @return Collection
     */
    public function GetUsers(): Collection
    {
        $users = User::with('roles')->get();
        return $users;
    }

    public function GetOneUser(int $id): User
    {
        $user = User::where('id', $id)->first();
        return $user;
    }
}