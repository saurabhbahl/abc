<?php


$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseusername");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");

echo "YES";
$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if (!$connection) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database");
}
mysqli_close();

?>
       