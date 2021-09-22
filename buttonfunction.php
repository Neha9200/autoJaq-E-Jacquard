
<?php 
session_start();
header("Refresh:0 , url=buttonfunction.php");
?>

<?php
		if(array_key_exists('button1', $_POST)) { 
			button1(); 
		} 
		else if(array_key_exists('button2', $_POST)) { 
			button2(); 
		}
		else if(array_key_exists('button3', $_POST)) { 
			button3(); 
		}  
		function button1() { 
			echo "This is Button1 that is selected"; 
			
		} 
		function button2() { 
			echo "This is Button2 that is selected"; 
			// header('Location: bom_form.php');
		} 
		function button3() { 
			echo "This is Button3 that is selected"; 
			// header('Location: jobissform.php');
		}
	?> 

	<form method="post" style="text-align:center;"> 
		<input type="submit" name="button1" class="button" value="Product" /> 
		
		<input type="submit" name="button2"	class="button" value="BOM" /> 

		<input type="submit" name="button3"	class="button" value="Job Issue" /> 
	</form> 