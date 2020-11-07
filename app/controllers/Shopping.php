<?php
class Shopping extends Controller
{
    public function __construct()
    {
        // instanciation
        $this->shoppingModel = $this->model('ShoppingModels');
        $this->customersModel = $this->model('CustomersModels');
    }

    // commande envoyée
    public function validation()
    {
        // message flash
        flash('validation_success', 'Nous avons bien reçu votre commande ! Votre commande a été acceptée, il ne vous reste plus qu\'à attendre la livraison de votre colis');

        // redirection
        redirect('');
        // chargement de la vue
        $this->view('shopping/validation');
    }

    // paiement
    public function ajaxaddcart()
    {
        $userId = $_SESSION['id'];
        return $this->customersModel->payment($userId);
    }

    public function shop()
    {

       $allShop =  $this->shoppingModel->listAll();

        $data = [
            'allShop' => $allShop
        ];
        // Load view
        $this->view('shopping/shop', $data);
    }


    public function cart()
    {
        // si user n'a pas de compte pour commander
        if (!array_key_exists('id', $_SESSION)) {

            // message flash
            flash('login_access', 'Vous devez être <a id="login_access" href=" https://braco.sites.3wa.io/test/coauto/users/login ">connecté</a> pour commander sur le site.');

            // redirection
            redirect('shopping/shop');
        }

        // chargement de la vue
        $this->view('shopping/cart');
    }

    public function payment()
    {
        // chargement de la vue
        $this->view('shopping/payment');
    }
}
