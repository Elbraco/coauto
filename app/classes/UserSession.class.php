<?php


class UserSession
{
    public function __construct()
    {
        //détermine le statut de le session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function createUser($userId, $firstName, $lastName, $email, $role)
    {
        // Création de la session User.
        $_SESSION =
            [
                'id'    => $userId,
                'firstname' => $firstName,
                'lastname'  => $lastName,
                'email'     => $email,
                'role'      => $role
            ];
    }
}
