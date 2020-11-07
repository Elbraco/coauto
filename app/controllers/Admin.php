<?php
class Admin extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('UserModels');
        $this->shoppingModel = $this->model('ShoppingModels');
        $this->adminModel = $this->model('AdminModels');
    }

    public function index()
    {
        //si le role de la session est ADMIN
        if ($_SESSION['role'] == 'ADMIN') {

            $listUsers = $this->userModel->listUsers();

            $listContact = $this->userModel->allMessageContact();

            $showarticles = $this->shoppingModel->listAll();

            $listcustomers = $this->adminModel->fiveLastCustomers();


            $data = [
                'listUsers' => $listUsers,
                'showarticles'  => $showarticles,
                'listContact' => $listContact,
                'listcustomers' => $listcustomers
            ];

            // Chargement de la vue + data
            $this->view('admin/index', $data);

            // sinon  
        } else {
            //redirection
            redirect('');
        }
    }

    //Supprimer un article
    public function deleteArticle($getId)
    {

        $this->adminModel->deleteProduct($getId);

        //message flash
        flash('delete', "L'article a été supprimé");

        //redirection
        redirect('admin/index');
    }

    //Supprimer un user
    public function deleteUser($getId)
    {
        $this->adminModel->deleteUser($getId);

        //message flash
        flash('delete', "L'utilisateur a été supprimé");

        //redirection
        redirect('admin/index');
    }

    public function article($shopId)
    {
        //si le role de la session est ADMIN
        if ($_SESSION['role'] == 'ADMIN') {
            //Détermine si $_POST est vide
            if (empty($_POST)) {
                $articles = $this->adminModel->findArticle($shopId);

                $data = ['articles' => $articles];

                //Chargement de la vue + data
                $this->view('admin/article', $data);
            } else {

                $this->adminModel->updateArticle($_POST);

                // message flash
                flash('update_article', 'Les modifications de l\'article ont été enregistrés');

                //redirection
                redirect('admin/index');
                //chargement de la vue
                $this->view('admin/article');
            }
        }
    }

    //Ajout d'un article
    public function addArticle()
    {
        // si le role n'est pas ADMIN
        if (array_key_exists('role', $_SESSION) == false || $_SESSION['role'] != 'ADMIN') {

            //Redirection
            redirect('');
        } else {

            //si submit n'est pas déclarée
            if (isset($_POST['submit'])) {
                $data = array();

                $file = $_FILES['picture'];
                // print_r($file);
                // nom du fichier
                $fileName = $_FILES['picture']['name'];
                // nom temporaire du fichier
                $fileTmpName = $_FILES['picture']['tmp_name'];

                // taille du fichier
                $fileSize = $_FILES['picture']['size'];

                // erreur du fichier
                $fileError = $_FILES['picture']['error'];
                // $fileTpe = $_FILES['picture']['type'];

                $fileExt = explode('.', $fileName);

                // renvoie une chaine minuscule et positionne à la fin 
                $fileActualExt = strtolower(end($fileExt));

                // type de fichier autorisé
                $allowed = array('jpg', 'jpeg', 'png', 'pdf');

                if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {

                        if ($fileSize < 1000000) {
                            $fileNameNew = $fileName;

                            // l'emplacement du fichier
                            $fileDestination = 'img/shopping/' . $fileNameNew;

                            // déplace le fichier téléchargé
                            $picture = move_uploaded_file($fileTmpName, $fileDestination);
                        } else {
                            // echo 'ficher trop gros';
                            $data['error_picture'] = 'Le fichier est trop gros';
                            $this->view('admin/addarticle', $data);
                        }
                    } else {
                        $data['error_download'] = 'Erreur de téléchargement.';
                    }
                }
                $this->adminModel->createArticle($_POST, $_FILES);
                // message flash
                flash('upload_picture', "L'article a bien été enregistré");

                // redirection
                redirect('admin/index');

                // Chargement de la vue + data
                $this->view('admin/addarticle', $data);
            }
        }
        // Chargement de la vue
        $this->view('admin/addarticle');
    }

    //Modifier User
    public function editUser($getId)
    {
        //si role est ADMIN
        if ($_SESSION['role'] == 'ADMIN') {

            if (empty($_POST)) {

                $editprofil = $this->adminModel->profilUser($getId);

                $data = ['editprofil' => $editprofil];

                //chargement de la vue + data
                $this->view('admin/edituser', $data);
            } else {

                $this->adminModel->updateUser($_POST);

                //message Flash
                flash('update_admin', 'Les modifications de l\'utilisateur ont bien été enregistrés');

                //redirection
                redirect('admin/index');
            }
        } else {
            // redirection
            redirect('');
        }
    }

    public function allorders() {

        if ($_SESSION['role'] == 'ADMIN') {

            $allcustomers = $this->adminModel->allCustomers();

            $data = [
                'allcustomers' => $allcustomers
            ];

        }

        $this->view('admin/allorders', $data);
    }
}
