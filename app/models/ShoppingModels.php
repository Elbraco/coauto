<?php
class ShoppingModels
{

	// Créer un article
	public function createArticle($post, $file)
	{
		$database = new Database;
		$database->executeSQL('INSERT INTO shopping (name, picture, description, quantity, price) VALUES ( ?, ?, ?, ?, ?)', [$post['name'], $file['picture']['name'], $post['description'], $post['quantity'], $post['price']]);
	}
	
	// Trouver un article
	public function findArticle($shopId)
	{
		$database = new Database;
		return $database->queryOne('SELECT id,name, picture, description, quantity, price FROM shopping WHERE id = ?', [$shopId]);
	}

	// Tous les articles
	public function listAll()
	{
		$database = new Database;

		return $database->query('SELECT id, name, picture, description, quantity, price, creationtime FROM shopping ORDER BY creationtime DESC');
	}

	// Trois derniers articles enregistrés
	public function threeLastProduct()
	{
		$database = new Database;

		return $database->query('SELECT id, name, picture, price FROM shopping ORDER BY id DESC LIMIT 3');
	}

	// Mise à jour article
	public function updateProduct()
	{
		$database = new Database;
		$database->executeSQL('UPDATE shopping SET name = ?, description = ?, quantity = ?, price = ? WHERE id = ?', [$_POST['name'], $_POST['description'], $_POST['quantity'], $_POST['price'], $_POST['postId']]);
		header('Location: admin.php');
		exit();
	}

	// Supprimer un article
	public function deleteProduct($getId)
	{
		$database = new Database;

		$database->executeSQL('DELETE FROM shopping WHERE id = ?', [$getId]);
	}
}
