<?php
	function dbConnexion()
	{
		return new PDO('mysql:host=localhost;dbname=swindle','root','superCaca123');
	}

	extract($_POST);

	if(isset($skype) && !empty($skype)){
		$DB = dbConnexion();
		
		try
		{
			$req = $DB->query('SELECT count(*)
								FROM swindle
								WHERE email="'.$email.'"');
			$v = $req->fetch();
			if($v[0] == 0){
				$DB->exec('INSERT INTO swindle (username, fullname, email, skype, stats) 
					   VALUES ("'.$username.'", "'.$fullname.'", "'.$email.'", "'.$skype.'",'.$stats.')');
			}
		} 				
		catch(PDOException $e)
		{
	  		echo $e->getMessage();
		}
		echo "ok";
	}
	else
		echo "Error, empty fields."
?>