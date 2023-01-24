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


$ris = "Il nome è: " . $nome;
$ris .= "<br>Il Cognome è: " . $cognome;
$ris .= "<br>Il tuo genere è: " . $genere;
$ris .= "<br>L'email è: " . $email;
$ris .= "<br>Il numero della tessera è: " . $numeroTessera;

$sql = "select * from testgym where ntessera = " . $numeroTessera;
$result = ($conn->query($sql));
//declare array to store the data of database

if ($result->num_rows > 0) {
	echo '<h3>Il numero di questa tessera è già presente nel database. Non si possono registrare 2 utenti con la stessa tessera</h3><br><p>Premi <a href="./accessi.php">qui</a> per verificare i tuoi accessi</p>';
}
$sql = "select * from testgym where email LIKE '" . $email . "'";
$result = ($conn->query($sql));
//declare array to store the data of database

if ($result->num_rows > 0) {
	echo '<h3>La mail inserita è già presente nel database. Non si possono registrare 2 utenti con la stessa email</h3><br><p>Premi <a href="./accessi.php">qui</a> per verificare i tuoi accessi</p>';
} else {
	$sql = "INSERT INTO testgym VALUES ('$nome',
					'$cognome','$genere','$email','$numeroTessera', '10', NULL)";

	if (mysqli_query($conn, $sql)) {
		echo '<h3>L\'utente è stato aggiunto correttamente</h3><br><p>Premi <a href="./accessi.php">qui</a> per verificare i tuoi accessi</p>';

		echo nl2br("\n$nome\n $cognome\n "
			. "$genere\n $email\n $numeroTessera");
		header("refresh:3;url=https://wpschool.it/palestre/test-gym/elenco.php");
	} else {
		echo "Errore: $sql. "
			. mysqli_error($conn);
	}
}