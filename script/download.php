<?php 

	$db_connetion = mysqli_connect("localhost", "root", "", "php_file_csv");

	

	$filename = "all-users-data.csv";

	header("Content-type: text/csv");
	header("Content-Disposition: attachment; filename=$filename");


	$csv = fopen("php://output","w");

	$columns = ["Name","Email","Age","Phone"];
	fputcsv($csv,$columns);

	$columns = ["","","",""];
	fputcsv($csv,$columns);


	$query = "select name, email, age, phone from users";
	$row = mysqli_query($db_connetion,$query);


	while ($data = mysqli_fetch_array($row)) {
		
		$user = [$data['name'],$data['email'],$data['age'],$data['phone']];
		fputcsv($csv,$user);
	}











?>