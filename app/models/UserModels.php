<?php

class UserModels
{

    // ajouter un utilisateur
    public function addUser($post)
    {
        $hashPassword = $this->hashPassword($post['password']);

        $database = new Database();

        $database->executeSQL('INSERT INTO users (email, password, firstname, lastname, address, zipcode, city, country, phone, role) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, "USER")', [$post['email'], $hashPassword, $post['firstname'], $post['lastname'], $post['address'], $post['zipcode'], $post['city'], $post['country'], $post['phone']]);
    }

    // mot de passe crypté
    private function hashPassword($password)
    {

        $salt = '$2y$11$' . substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);
        return crypt($password, $salt);
    }

    // connection utilsateur
    public function connectUser($post)
    {
        $database = new Database();
        $user = $database->queryOne('SELECT id, email, password, firstname, lastname, address, zipcode, city, country, phone, creationtime, role FROM users WHERE email = ?', [$post['email']]);

        if ($user !== false && $this->verifyPassword($post['password'], $user['password']) === true) {

            $userSession = new UserSession();
            $userSession->createUser(
                $user['id'],
                $user['firstname'],
                $user['lastname'],
                $user['email'],
                $user['role']
            );

            // message flash
            flash('login_success', 'Vous êtes connecté');

            // redirection
            redirect('');
        }
    }

    // vérification du mot de passe hashé
    private function verifyPassword($password, $hashedPassword)
    {

        return crypt($password, $hashedPassword) == $hashedPassword;
    }

    // Profil de l'utilisateur
    public function profilUser($getid)
    {
        $database = new Database();

        return $database->queryOne('SELECT id, email, password, firstname, lastname, address, zipcode, city, country, phone, creationtime, role FROM users WHERE id = ?', [$getid]);
    }

    // Mise à jour de l'utilisateur
    public function updateUser($post)
    {
        $database = new Database();

        $database->executeSQL('UPDATE users SET  email = ?, firstname = ?, lastname = ?, address = ?, zipcode = ?, city = ?, country = ?, phone = ? WHERE id = ?', [$post['email'], $post['firstname'], $post['lastname'], $post['address'], $post['zipcode'], $post['city'], $post['country'], $post['phone'], $post['postId']]);
    }

    // Supprimer compte utilisateur
    public function deleteUser($getId)
    {
        
        $database = new Database();
        
        $database->executeSQL('DELETE FROM users where id = ?', [$getId]);
        
        // message flash
        flash('delete_account', 'Votre compte a bien été supprimé');
        
    }

    // Trouver un utilsateur
    public function findUser($post)
    {
        $database = new Database;

        $user = $database->queryOne('SELECT id FROM users WHERE email = ?', [$post['email']]);

        return $user;
    }

    // Listes des utlisateurs
    public function listUsers()
    {
        $database = new Database();

        return $database->query('SELECT id, email, firstname, lastname, address, zipcode, city, country, phone, creationtime, role FROM users ');
    }

    // Envoyer message
    public function messageContact($post)
    {
        $database = new Database();

        $database->executeSQL('INSERT INTO contact (email, sujet, message_contact) VALUES(?, ?, ?)', [$post['email'], $post['sujet'], $post['message_contact']]);
    }

    // Tous les messages
    public function allMessageContact()
    {
        $database = new Database();

        return $database->query('SELECT id, email, sujet, message_contact, date_post FROM contact ORDER BY date_post DESC');
    }
}
