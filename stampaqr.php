<?php 
include('./phpqrcode/qrlib.php');
?>
<!-- stampaqr.php-->
<!DOCTYPE html>
<html>
<head>
	<title>QR Code con PHP e AJAX</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script src="https://code.jquery.com/jquery-latest.js"></script> 
</head>
<script type="text/javascript">
	$(document).ready(function() {
	
	$('#reset').click(function(){ 
		location.reload();	   
	});
	
	$('#genera').click(function()
	{
		// Per inviare simboli speciali come +, &, = in Javascript occorre usare il metodo
		// encodeURIComponent()che codifica tutti i caratteri speciali presenti nella stringa
		var testo= <?php echo $_POST["ntessera"] ?>;
		var dimensione= $("#dimensione").val();
		var parametri='testo='+ testo+'&dimensione='+dimensione;
		//chiamata ajax
		$.ajax(
		{
			type: "POST",
			url: "https://wpschool.it/palestre/Trimons-Gym/generaqrcode.php",
			data: parametri,
			cache:false,
			success: function (risultato)
			{
					$('#immagineqr').html(risultato); //visualizza il QR Code
					$('#genera').attr("disabled", true);	
					$('#testo').attr("disabled", true);
					$('#dimensione').attr("disabled", true);
			}
			});
			return false;
	});
 });
</script> 
<body>

	<form>
	<h1>QR Code con PHP e AJAX</h1>
		<label>Testo [max 200 caratteri]</label><br/>
		<input type="hidden" name="ntessera" value="<?php $_POST["ntessera"] ?>">
		<label>Pixel Size[1-10]</label><br/>
		<select id="dimensione">
			<?php
			for($i=1;$i<=10;$i++)
			{
				if($i==5) {
					echo"<option value=$i selected>$i</option>";
				}
				else{
					echo"<option value=$i>$i</option>";
				}
			}
			?>
		</select>
		<br/><br/>
		<input type="reset"  id="reset"  value="Reset">
		<input type="submit" id="genera" value="Genera QR Code">	
 	</form>
	<br/><br/>
	<div id="immagineqr">*</div> <!-- div dove viene visualizzato il QR Code-->
</body>
</html>






