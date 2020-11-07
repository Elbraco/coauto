<?php
class PagesController extends Controller
{

	public function __construct()
	{

		$this->shoppingModel = $this->model('ShoppingModels');
		$this->userModel = $this->model('UserModels');
	}

	public function services()
	{

		//chargement de la vue services
		$this->view('pages/services');
	}

	public function index()
	{

		$lastproducts = $this->shoppingModel->threeLastProduct();

		$datas = [
			'lastproducts' => $lastproducts

		];

		//chargement de la vue + data
		$this->view('pages/index', $datas);
	}

	public function about()
	{

		// Chargement de la vue about
		$this->view('pages/about');
	}

	public function contact()
	{

		// si $_POST n'est pas vide
		if (!empty($_POST)) {

			$data = array();

			// si $_POST est vide
			if (empty($_POST['email'])) {

				$data['error_email'] = 'Entrez un mail';
			}

			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

				$data['error_email'] = 'Rentrez une adresse valide';
			}

			if (empty($_POST['sujet'])) {

				$data['error_sujet'] = 'Veuillez entrer un sujet';
			}

			if (empty($_POST['message_contact'])) {

				$data['error_message'] = 'Veuillez écrire votre message';
			}
			// si $data est vide
			if (empty($data)) {

				$this->userModel->messageContact($_POST);

				// message flash
				flash('mail_success', 'Votre mail a bien été envoyé');

				// redirection
				redirect('');
			}

			// chargement de la vue avec données
			$this->view('pages/contact', $data);
		}
		// chargement de la vue contact
		$this->view('pages/contact');
	}
}
