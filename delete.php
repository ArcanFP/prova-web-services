<?php
$conn = mysqli_connect(/*inserire database*/);
//Check Connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "DELETE FROM testgym WHERE id=" . $_POST["id"];

if ($conn->query($sql) === TRUE) {
  echo "<b>L'utente è stato eliminato correttamente</b>";
  header("refresh:3;url=https://wpschool.it/palestre/test-gym/elenco.php");
} else {
  echo "Error deleting record: " . $conn->error;
}


?>