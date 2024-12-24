<?php

$connection = pg_connect("host=localhost dbname=book_db user=postgres password=zxccxz7705");

if (!$connection) {
    die('Connection failed: ' . pg_last_error());
}

if (isset($_POST['send'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$location = $_POST['location'];
	$guests = $_POST['guests'];
	$arrivals = $_POST['arrivals'];
	$leaving = $_POST['leaving'];

	$request = "INSERT INTO book_db (name, email, phone, address, location, guests, arrivals, leaving) VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";

	$result = pg_query($connection, $request);

	if ($result) {
		header('Location: book.php');
	} else {
		echo 'Failed to insert data: ' . pg_last_error();
	}
} else {
	echo 'Something went wrong, try again';
}

?>
