<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $code = $_POST['code'];


	// Database connection
	$conn = new mysqli('localhost','root','','buy form');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users(firstname, lastname,email,phone,code)
         values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssii", $firstname, $lastname, $email, $phone, $code,);
		$execval = $stmt->execute();
		echo $execval;
		echo "Your is Order placed,Payment link will be sent on email! , thank you...";
		$stmt->close();
		$conn->close();
	}
?>