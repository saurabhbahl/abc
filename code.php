<?php

if(isset($_POST['submit']))
{
	
	// echo "YEAH";var_dump($_POST); die("exit");
	
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");


//Get POST Data Here
$databaseName=mysqli_real_escape_string($connection,$_POST['dbName']);
$userName=mysqli_real_escape_string($connection,$_POST['userName']);
$password=mysqli_real_escape_string($connection,$_POST['password']);
$tableName=mysqli_real_escape_string($connection,$_POST['tableName']);


// echo "user ".$dbuser." ".$dbpwd." dbname ".$dbname." port  ".$dbport;
$connection = mysqli_connect($dbhost, 'grab123', 'dummy_user') or die(mysqli_connect_error($connection));
// var_dump($connection);

if (!$connection) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
 else {
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
		  mysqli_query($connection,"CREATE DATABASE ".$databaseName) or die("database Create");
		
		  mysqli_query($connection,"CREATE USER '".$userName."'@'%' IDENTIFIED BY '".$password."';")or die("User Created");
		 
		  mysqli_query($connection,"grant all on ".$databaseName.".* to ".$userName."@'%';")or die("Grant Permissions");
		 
		 mysqli_query($connection,"Create Table ".$tableName."( id int(11) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(150) NOT NULL)")or die(mysqli_error($connection));
		  
		   
		// mysqli_query($connection,"INSERT INTO new_master(name) VALUES('Salman')") or die(mysqli_error($connection)); 
			 
		
		 //mysqli_query($connection,"FLUSH PRIVILEGES;")or die("Flush ");                                                                                                                                                          
		 // var_dump($connection);
		 
	     mysqli_close($connection);
		$errorMessage="DB Created Successfully";
}
else
{
	$errorMessage="";
}

?>


<DOCTYPE HTML>
<html>

<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  
  .mainHead{
		width:280px;
		position: absolute;
		left: 0;
		top: 0;
		bottom: 0;
		right: 0;
		margin: auto;
		vertical-align: middle;
		background: #1a3584;
		height: fit-content;
		padding:15px;
  }
  
  .heading
  {
	color:white;
	font-size:17px;
	text-align: center;
    padding: 0 0 10px 0;
	}
	.ceteredItems
	{
		    text-align: center;
	}
	
	.error_message
	{
		color:red;
		font-size:15px;
	}
  </style>

 </head>

<body>
  
  <div class="row container mainHead">
  <div class="error_message"><?php echo $errorMessage;?></div>
  
  <div class="heading">Create New Database.</div>
	
    <form action="code.php" method="post">
		
		<!--   Database Name -->
		<div class="form-group ">
	      <input type="text" class="form-control" placeholder="Database Name" name="dbName" required>
		</div>
		
		<!--   User Name -->
			<div class="form-group ">
	      <input type="text" class="form-control" placeholder="User Name" name="userName" required>
		</div>
		
		<!--   Password    -->	
			<div class="form-group ">
	      <input type="password" class="form-control" placeholder="Password" name="password" required>
		</div>
		
		<!--  Create Table Name -->
		<div class="form-group ">
	      <input type="text" class="form-control" placeholder="Table Name" name="tableName" required>
		</div>
		
		<!-- Submit button -->
		<div class="form-group ceteredItems">
		   <input type="submit" value="Create" class="btn btn-default" name="submit">
		 </div>
  </div>
</body>

</html>
       