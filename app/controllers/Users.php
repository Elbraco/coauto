<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('UserModels');
        $this->shoppingModel = $this->model('ShoppingModels');
        $this->customersModel = $this->model('CustomersModels');
        $this->adminModel = $this->model('AdminModels');
    }


    // se connecter
    public function login()
    {
        if (!empty($_POST)) {
            $data = array();

            if (empty($_POST['email'])) {
                $data['error_email'] = 'Entrez un mail';
            }

            if ($this->userModel->findUser($_POST)) {
                // user trouvé
            } else {
                // user non trouvé
                $data['error_email'] = 'Utilisateur non trouvé';
            }

            if (empty($data)) {

                $login = $this->userModel->connectUser($_POST);
                if ($login) {

                    //    message flash
                    flash('login_success', 'Vous êtes connecté');
                } else {

                    //    pas trouvé
                    $data['error_connexion'] = 'mot de passe incorrecte';
                }
            }
            // chargement de la vue + data
            $this->view('users/login', $data);
        }
        // chargement de la vue
        $this->view('users/login');
    }

    // s'enregistrer
    public function register()
    {
        if (!empty($_POST)) {

            $data = array();

            if (empty($_POST['email'])) {

                $data['error_email'] = 'Entrez un mail';
            }

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

                $data['error_email'] = 'Rentrez une adresse valide';
            } else {

                $user = $this->userModel->findUser($_POST);

                if ($user) {

                    $data['error_email'] = 'cet email existe déja';
                }
            }

            if (empty($_POST['password'])) {

                $data['error_password'] = 'Entrez un mot de passe';
            } elseif (strlen($_POST['password']) < 6) {

                $data['error_password'] = "Le mot de passe doit contenir au moins 6 caractères";
            }

            if ($_POST['password'] != $_POST['confirmpassword']) {

                $data['error_password'] = 'Vous n\'avez pas choisi le même mot de passe';
            }

            if (empty($_POST['firstname'])) {

                $data['error_firstname'] = 'Entrez votre prénom';
            }

            if (empty($_POST['lastname'])) {

                $data['error_lastname'] = 'Entrez votre nom';
            }

            if (empty($_POST['address'])) {

                $data['error_address'] = 'Entrez votre adresse';
            }

            if (empty($_POST['zipcode'])) {

                $data['error_zipcode'] = 'Entrez votre code postal';
            }
            if (empty($_POST['city'])) {

                $data['error_city'] = 'Entrez votre ville';
            }
            if (empty($_POST['country'])) {

                $data['error_country'] = 'Entrez votre pays';
            }
            if (empty($_POST['phone'])) {

                $data['error_phone'] = 'Entrez votre numéro de téléphone';
            }

            if (empty($data)) {

                $this->userModel->addUser($_POST);
                // message flash
                flash('register_success', 'Ton compte a bien été enregisté');

                // redirection
                redirect('');
            }
            // chargement de la vue
            $this->view('users/register', $data);
        }
        // Chargement view
        $this->view('users/register');
    }

    // Profil
    public function profil($getId)
    {
        if (array_key_exists('id', $_SESSION)) {

            if ($getId ==  $_SESSION['id'] || $_SESSION['role'] == 'ADMIN') {

                $profil = $this->userModel->profilUser($getId);

                $orderdetails =  $this->customersModel->findDetails($getId);

                $data = [
                    'profil' => $profil,
                    'orderdetails' => $orderdetails
                ];

                // Chargement view
                $this->view('users/profil', $data);
            } else {
                // echo 'tu nas pas le droit';

                // redirection
                redirect('');
            }
        }
    }

    //Déconnexion
    public function logout()
    {
        //destroy variable
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        unset($_SESSION['firstname']);
        unset($_SESSION['lastname']);
        unset($_SESSION['role']);

        session_destroy();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        flash('loginout_message', 'Vous êtes déconnecté.');

        //redirection
        redirect(" ");
    }

    //Modification du profil
    public function editProfil($getId)
    {
        if ($getId == $_SESSION['id'] || $_SESSION['role'] == 'ADMIN') {
            if (empty($_POST)) {

                $editprofil = $this->userModel->profilUser($getId);

                $data = ['editprofil' => $editprofil];

                // chargement de la vue
                $this->view('users/editprofil', $data);
            } else {

                $this->userModel->updateUser($_POST);

                // message flash
                flash('update_message', 'Vos informations ont bien été enregistrées.');

                // redirection
                redirect('users/profil/' . $_SESSION['id']);

                // chargement de la vue
                $this->view('users/editprofil');
            }
        } else {
            // redirection
            redirect('');
        }
    }

    // supprimer profil
    public function deleteProfil($getId)
    {
        


        if ($getId == $_SESSION['id'] || $_SESSION['role'] == 'ADMIN') {

            $this->userModel->deleteUser($getId);

            // destruction de la session
            session_destroy();

            // redirection
            redirect('');

}
       
       
    }

    // commande
    public function customers($customerId)
    {
        if (empty($_POST)) {

            $customerslines = $this->customersModel->findOrderLines($customerId);

            $taxes = $this->customersModel->taxes($customerId);

            $informations = $this->adminModel->contactInformation($customerId);

            $data = [
                'customerslines' => $customerslines,
                'taxes' => $taxes,
                'informations' => $informations
            ];
        }
        // chargement de la vue + data
        $this->view('users/customers', $data);
    }
}