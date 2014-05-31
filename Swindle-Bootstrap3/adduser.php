<?php
    require_once 'inc.config.php';
    session_start();

    $skype = isset($_POST['skype']) ? $_POST['skype'] : 0;
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 0;
    $fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : 0;
    if(!isset($_SESSION['email'])) {
        $email = isset($_POST['email']) ? $_POST['email'] : 0;
    } else {
        $email = $_SESSION['email'];
    }
    $stats = isset($_SESSION['stats']) ?$_SESSION['stats'] : 0;

    if(!empty($skype) && !empty($username) && !empty($fullname) && !empty($email) && !empty($stats)) {
        
        try {
            $DB = new PDO('mysql:host='.$host.';dbname='.$dbname.'',$user,$password);
            $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();die();
        }
        $querySearch = 'SELECT count(*) FROM swindle WHERE email = :email';
        $queryInsert = 'INSERT INTO swindle (username, fullname, email, skype, stats)
                VALUES (?, ?, ?, ?, ?)'; 
        try {
            $search = $DB->prepare($querySearch);
            $search->execute(array(':email' => $email));
            $v = $search->fetch();
            if($v[0] == 0){
                $insert = $DB->prepare($queryInsert);
                $insert->execute(array($username,$fullname,$email,$skype,$stats));
            }
        } catch(PDOException $e) {
            echo "Error, pdoException: ".$e->getMessage();die();
        }
        echo "ok";
    } else {
        echo "Error, empty fields.";
    }

