<?php


$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");


echo "user ".$dbuser." ".$dbpwd." dbname ".$dbname." port  ".$dbport;
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
mysqli_close($connection);


?>
       