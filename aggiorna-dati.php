<?php
$conn = mysqli_connect(/*inserire database*/);
//Check Connection
if ($conn === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

$nome = $_POST["name"];
$cognome = $_POST["surname"];
$genere = $_POST["gender"];
$email = $_POST["email"];
$numeroTessera = $_POST["ntessera"];

$sql = "UPDATE testgym SET nome = '" . $nome . "', cognome = '" . $cognome . "', genere = '" . $genere . "', email = '" . $email . "' WHERE ntessera = " . $numeroTessera . ";";
if ($conn->query($sql) === TRUE) {
  echo "L'utente è stato aggiornato correttamente";
  header("refresh:3;url=https://wpschool.it/palestre/test-gym/elenco.php");
} else {
  echo "Errore: " . $conn->error;
}