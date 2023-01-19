<?php
 //generaqrcode.php------------------------------------------
	if(isset($_POST["testo"]) &&isset($_POST["dimensione"]))
	{
		// imposto il percorso e il nome in cui salvare il QR generato 
		$file="temp.png";
		// cancello il file temp.png prima di generarne uno nuovo
		if (file_exists($file))unlink($file);
		$text = $_POST["testo"];
		$pixel_size=$_POST["dimensione"];
		//imposto la capacità di correzione degli errori di QR ad H 
		$ecc="H"; 
		include('phpqrcode/qrlib.php');
		// genero il QR Code
		// QRcode::png(text, file, ecc, pixel_size, frame_size);
		QRcode::png($text,$file,$ecc,$pixel_size);
		// output del QR Code per il browser
		echo "<img src='".$file."' />";
	}
?>