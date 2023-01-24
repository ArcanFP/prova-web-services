<?php
$conn = mysqli_connect("mysql.next-data.net", "www_13237", "uBaKfYFM", "www_wpschool_it");
//Check Connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "select * from testgym where id = " . $_POST["id"];
$result = ($conn->query($sql));
//declare array to store the data of database
$rows = [];

if ($result->num_rows > 0) {
    // fetch all data from db into array 
    $rows = $result->fetch_all(MYSQLI_ASSOC);
}

$new_accessi = $rows[0]["accessi"] + $_POST["accessi"];

$sql = "UPDATE testgym SET accessi = " . $new_accessi . " WHERE id = " . $_POST["id"];

$verifica = false;
if ($conn->query($sql) === TRUE) {
    $verifica = true;
    echo "<b>Hai aggiunto " . $_POST["accessi"] . " accessi correttamente all'utente</b><br><br><p>Per tornare all'elenco utenti premi <a href='C:\Users\Amministratore\Documents\web-services\prova-web-services\elenco.php'>qui</a></p>";
    header("refresh:3;url=https://wpschool.it/palestre/test-gym/elenco.php");
}
?>