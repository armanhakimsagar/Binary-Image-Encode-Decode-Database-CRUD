<?php

	// collect image & encode
	
	$path = 'a.jpg';
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	
	//print_r($base64);
	
	//insert database
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "binary";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO data(image) VALUES ('$path')";

	
	//-------------------------------- view data ---------------------------
	
	$sql = "SELECT * FROM data";
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()) {
        echo $row["image"];
    }
	
	
	
?>