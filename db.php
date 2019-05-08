
<?php


function pdoConnection() {
	$username = "root";
	$password = "blah";

	$dsn = "mysql:host=localhost;dbname=scinexdavid";
	$options = [
		  PDO::ATTR_EMULATE_PREPARES   => false,
		  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	];

	try {
		$pdo = new PDO($dsn, $username, $password, $options);
	}
	catch (Exception $e){
		error_log($e->getMessage());
		 exit('Something weird happened'); //something a user can understand
	}

	return $pdo;
	$pdo = null;

}

?>
