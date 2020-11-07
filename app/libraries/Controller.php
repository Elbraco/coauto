<?php 
	
	class Controller {
		
		// Chargement model
		public function model($model){
			// Require model file
			require_once '../app/models/' . $model. '.php';

			// Instantiate model
			return new $model();
		}

		// Chargement view
		public function view($view, $data = []){
			
			// import varialbe
			extract($data);
			
			// Check for view file
			if(file_exists('../app/views/' . $view. '.phtml')){
				require_once '../app/views/' . $view. '.phtml';
			} else {
				// View does not exist
				die("View does not exist");
			}
		}
	}
 ?>