<?php


$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");

echo "YEAH";

// echo "user ".$dbuser." ".$dbpwd." dbname ".$dbname." port  ".$dbport;
$connection = mysqli_connect($dbhost, 'ftf', 'dummy_user','ftfdb') or die(mysqli_connect_error($connection));
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
		 // mysqli_query($connection,"CREATE DATABASE ftfdb") or die("database Create");
		
		 // mysqli_query($connection,"CREATE USER 'ftf'@'%' IDENTIFIED BY 'dummy_user';")or die("User Created");
		 
		 // mysqli_query($connection,"grant all on ftfdb.* to ftf@'%';")or die("Grant Permissions");
		 
		 mysqli_query($connection,"Create Table new_master( id int(11) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(150) NOT NULL)")or die(mysqli_error($connection));
		  
		   
		 mysqli_query($connection,"INSERT INTO new_master(name) VALUES('Salman')") or die(mysqli_error($connection)); 
			 
		
		 //mysqli_query($connection,"FLUSH PRIVILEGES;")or die("Flush ");                                                                                                                                                          
		 // var_dump($connection);
		 
	     mysqli_close($connection);


?>
       