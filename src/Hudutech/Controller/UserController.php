<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/1/17
 * Time: 11:47 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\UserInterface;
use Hudutech\Auth\Auth;
use Hudutech\Entity\User;

class UserController extends Auth implements UserInterface
{
    public function create(User $user)
    {

    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function destroy()
    {
        // TODO: Implement destroy() method.
    }

    public static function getId($id)
    {
        // TODO: Implement getId() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }

    public function resetPassword($userId, $newPassword)
    {
        // TODO: Implement resetPassword() method.
    }

    public function changeRole($userId, $role)
    {
        // TODO: Implement changeRole() method.
    }

}