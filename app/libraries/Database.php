<?php 
	/*
	 * PDO Database Class
	 * Connect to database
	 * Create prepared statements
	 * Bind values
	 * Return rows and results
	 */
	class Database {
		private $host = DB_HOST;
		private $user = DB_USER;
		private $pass = DB_PASS;
		private $dbname = DB_NAME;
		private $charset = DB_CHAR;

		private $pdo;
		private $error;

		public function __construct(){
			// Set DSN
			$db = 'mysql: host='. $this->host .';dbname=' . $this->dbname . ';charset=' .$this->charset;
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				// PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES => false
			);

			try{
				$this->pdo = new PDO($db, $this->user, $this->pass, $options);
			} catch(PDOException $e){
				$this->error = $e->getMessage();
				echo $this->error;
			}
		}

		// récupère une ligne
		public function queryOne($sql, array $params = array())
          {
                 $query = $this->pdo->prepare($sql);
                 $query->execute($params);
        
                 return $query->fetch(PDO::FETCH_ASSOC);
          }

		//   récupere toutes les lignes en tableau
          public function query($sql, array $params = array())
          {
                 $query = $this->pdo->prepare($sql);
                 $query->execute($params);
        
                 return $query->fetchAll(PDO::FETCH_ASSOC);     
          }

		//   Insérer modifier supprimer 
          public function executeSQL($sql, array $params = array())
          {
             $query = $this->pdo->prepare($sql);

			 $query->execute($params);
			 
			return $this->pdo->lastInsertId();

          }
		
		
	}
 ?>