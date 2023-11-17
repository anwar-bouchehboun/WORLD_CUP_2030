<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "worldcup";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);



// sql to delete a record
$sql = "UPDATE equipe SET capital WHERE id = 3";

if (mysqli_query($conn, $sql)) {
  echo "Record update successfully";
} 

mysqli_close($conn);
?>"
