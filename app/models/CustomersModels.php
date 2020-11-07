<?php
class CustomersModels
{
    // Paiement
    public function payment($userId)
    {
        $database = new Database();

        $customerId = $database->executeSQL('INSERT INTO customers (user_id, creationtimestamp, taxRate) VALUES (?, NOW(), 20.0)', [$userId]);

        // Décode une chaine JSON
        $products = json_decode($_POST['shopping'], true);
        // // print_r($products);

        $totalAmount = 0;

        // récupération de tous les produits sélectionnés 
        foreach ($products as $product) {
            //   $database = new Database();
            // print_r($product['name'].' ** ');

            // calcul totalamount
            $totalAmount += $product['quantity'] * $product['price'];
            $allTaxesIncluded = 0;

            // calcul alltaxes
            $allTaxesIncluded += $totalAmount;

            $database->executeSQL('INSERT INTO customerslines (customer_Id, shopping_id, quantityOrdered, priceEach) VALUES (?, ?, ?, ?)', [$customerId, $product['venteId'], $product['quantity'], $product['price']]);
        }

        // mise à jour du client
        $database->executeSQL('UPDATE customers SET totalAmount = ?, taxAmount = ? * taxRate / 100, allTaxesIncluded = ? + taxAmount WHERE id = ?', [$totalAmount, $totalAmount, $allTaxesIncluded, $customerId]);

        return $customerId;
    }

    // Liste customers
    public function listAll()
    {
        $database = new Database();

        return $database->query('SELECT id, user_id, totalAmount, taxRate, taxAmount, creationtimestamp, completetimestamp FROM customers ORDER BY creationtimestamp');
    }

    // Détails de la commande
    public function findDetails($user_Id)
    {
        $database = new Database();


        return $database->query(' SELECT id, totalAmount, taxRate, taxAmount, creationtimestamp, allTaxesIncluded FROM customers WHERE user_id = ? ORDER BY creationtimestamp DESC', [$user_Id]);
    }

    // Détails de la commande
    public function findOrderLines($customerId)
    {
        $database = new Database();

        return $database->query('SELECT quantityOrdered, priceEach, name, picture FROM customerslines INNER JOIN shopping on shopping.id = customerslines.shopping_id WHERE customer_Id = ?', [$customerId]);
    }

    // Détails de la commande
    public function taxes($customerId)
    {
        $database = new Database();

        return $database->queryOne('SELECT id, creationtimestamp, taxAmount, totalAmount, allTaxesIncluded FROM customers WHERE id = ?', [$customerId]);
    }
}
