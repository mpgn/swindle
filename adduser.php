<?php
	session_start();
	function dbConnexion()
	{
		return new PDO('mysql:host=localhost;dbname=swindle',/*user*/,/*pass*/);
	}

	$skype = isset($_POST['skype']) ? $_POST['skype'] : 0;
	$username = isset($_SESSION['username']) ? $_SESSION['username'] : 0;
	$fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : 0;
	$email = isset($_SESSION['email']) ? $_SESSION['email'] : 0;
	$stats = isset($_SESSION['stats']) ?$_SESSION['stats'] : 0;

	if(!empty($skype) && !empty($username) && !empty($fullname) && !empty($email) && !empty($stats)){
		$DB = dbConnexion();
		$querySearch = 'SELECT count(*) FROM swindle WHERE email = :email';
		$queryInsert = 'INSERT INTO swindle (username, fullname, email, skype, stats)
				VALUES (?, ?, ?, ?, ?)';
		
		try
		{
			$search = $DB->prepare($querySearch);
			$search->execute(array(':email' => $email));
			$v = $search->fetch();
			if($v[0] == 0){
				$insert = $DB->prepare($queryInsert);
				$insert->execute(array($username,$fullname,$email,$skype,$stats));
			}
		} 				
		catch(PDOException $e)
		{
	  		echo "Error, pdoException.";
		}
		echo "ok";
	}
	else
		echo "Error, empty fields.";
?>
