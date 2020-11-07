<?php
class AdminModels
{

    // Trouver article
    public function findArticle($shopid)
    {
        $database = new Database();

        return $database->queryOne('SELECT id, name, picture, description, quantity, price FROM shopping WHERE id = ?', [$shopid]);
    }

    // Supprimer un article
    public function deleteProduct($getId)
    {
        $database = new Database;

        $database->executeSQL('DELETE FROM shopping WHERE id = ?', [$getId]);
    }

    // Mise à jour de l'article
    public function updateArticle($post)
    {
        $database = new Database();

        $database->executeSQL('UPDATE shopping SET  name = ?, description = ?, quantity = ?, price = ? WHERE id = ?', [$post['name'], $post['description'], $post['quantity'], $post['price'], $post['postId']]);
    }

    // Création de l'article
    public function createArticle($post, $file)
    {
        $database = new Database;
        $database->executeSQL('INSERT INTO shopping (name, picture, description, quantity, price) VALUES ( ?, ?, ?, ?, ?)', [$post['name'], $file['picture']['name'], $post['description'], $post['quantity'], $post['price']]);
    }

    // Voir utilisateur
    public function profilUser($getid)
    {
        $database = new Database();

        return $database->queryOne('SELECT id, email, password, firstname, lastname, address, zipcode, city, country, phone, creationtime, role FROM users WHERE id = ?', [$getid]);
    }
    
    // Mise à jour utilisateur
    public function updateUser($post)
    {
        $database = new Database();

        $database->executeSQL('UPDATE users SET  email = ?, firstname = ?, lastname = ?, address = ?, zipcode = ?, city = ?, country = ?, phone = ?, role = ? WHERE id = ?', [$post['email'], $post['firstname'], $post['lastname'], $post['address'], $post['zipcode'], $post['city'], $post['country'], $post['phone'], $post['role'], $post['postId']]);
    }

    // Supprimer Utilisateur
    public function deleteUser($getId)
    {
        $database = new Database();

        $database->executeSQL('DELETE FROM users WHERE id = ?', [$getId]);
    }

    // les 5 dernieres commandes
    public function fiveLastCustomers()
    {
        $database = new Database();

        return $database->query('SELECT id, creationtimestamp, allTaxesIncluded FROM customers ORDER BY creationtimestamp DESC LIMIT 5 ');
    }

    // Toutes les commandes
    public function allCustomers()
    {
        $database = new Database();

        return $database->query('SELECT id, creationtimestamp, allTaxesIncluded  FROM customers ORDER BY creationtimestamp DESC ');
    }

    // Infos sur le profil customerslines
    public function contactInformation($customerId)
    {
        $database = new Database();

        return $database->queryOne('SELECT firstname, lastname, address, zipcode, city, country FROM customers INNER JOIN users on users.id = customers.user_id WHERE customers.id = ?', [$customerId]);
    }
}
