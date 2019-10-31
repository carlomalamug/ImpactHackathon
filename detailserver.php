<?php 
	session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }

	// variable declaration
	$name = "";
	$contactno  = "";
	$lag    = "";
	$log    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'fixit');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$contactno = mysqli_real_escape_string($db, $_POST['contactno']);
		$address = mysqli_real_escape_string($db, $_POST['address']);


		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO userdets (name, contact) 
					  VALUES('$name','$contactno')";
			mysqli_query($db, $query);

			$_SESSION['name'] = $name;
			$_SESSION['success'] = "You are now booked";
			header('location: dashbaordadminn.php');
		}

	}

	$dsn = 'mysql:host=localhost;dbname=fixit';
	$username = "root";
	$password = "";
	$options = [];
	
	try {
		$connection = new PDO($dsn, $username, $password, $options);
	} catch (PDOException $e) {
		
	}


//Select
	$sql = 'SELECT * FROM userdets';
	$statement = $connection->prepare($sql);
	$statement->execute();
	$dets = $statement->fetchAll(PDO::FETCH_OBJ);


?>