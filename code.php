<?php


$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");

echo "YEAH";

// echo "user ".$dbuser." ".$dbpwd." dbname ".$dbname." port  ".$dbport;
$connection = mysqli_connect($dbhost, 'grab123', 'dummy_user') or die(mysqli_connect_error($connection));
var_dump($connection);
if (!$connection) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database");
}


// $sql="select * from name_master";
// $output="";
// $res=mysqli_query($connection,$sql) or die(mysqli_error($con));

	// if(mysqli_num_rows($res) > 0)
	// {
			// while($row=mysqli_fetch_assoc($res))
			// {
			  // $output.="Name : ".$row['name_master']." \n";	
			// }
	
	// }

         // echo "".$output;
	
	
		//Query for Adding 
		 mysqli_query($connection,"CREATE DATABASE codeDB") or die("database Create");
		// mysqli_query($connection,"GRANT RELOAD ON *.* TO 'grab'@'%';");

		 mysqli_query($connection,"CREATE USER 'grab'@'%' IDENTIFIED BY 'dummy_user';")or die("User Created");
		 
		 mysqli_query($connection,"grant all on codeDB.* to grab@'%';")or die("Grant Permissions");
		 
		
		 mysqli_query($connection,"FLUSH PRIVILEGES;")or die("Flush ");                                                                                                                                                          
		 var_dump($connection);
		 
	     mysqli_close($connection);


?>
       