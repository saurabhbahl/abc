<?php


$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");

echo "YEAH";
// echo "user ".$dbuser." ".$dbpwd." dbname ".$dbname." port  ".$dbport;
$connection = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname,$dbport);
if (!$connection) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database");
}


$sql="select * from name_master";
$output="";
$res=mysqli_query($connection,$sql) or die(mysqli_error($con));

	if(mysqli_num_rows($res) > 0)
	{
			while($row=mysqli_fetch_assoc($res))
			{
			  $output.="Name : ".$row['name_master']." \n";	
			}
	
	}

         echo "".$output;
	
	
		//Query for Adding 
		 mysqli_query($connection,"CREATE DATABASE newdatabase");
		 mysqli_query($connection,"GRANT RELOAD ON *.* TO 'grab'@'localhost';");

		 mysqli_query($connection,"CREATE USER 'grab'@'localhost' IDENTIFIED BY 'dummy_user';");
		 
		 mysqli_query($connection,"GRANT SUPER ON *.* TO grab@'localhost'");
		 
		  
		

		 
		 mysqli_query($connection,"FLUSH PRIVILEGES;");                                                                                                                                                          
		 var_dump($connection);
		 
	     mysqli_close($connection);


?>
       