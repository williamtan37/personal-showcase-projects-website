<?php
function sendMail(){
	$msg = "HO HO HO Happy Christmas! \n";
	$msg .= "My name is " . $_POST["name"] . "!\n";
	$msg .= "My Wishlist: ";
	
	$subject = $_POST["name"] . " Christmas Wishlist";
	$headers = "From: will@willtan.tech";

	for($i=0; $i<count($_POST["items"]);$i++){
		$msg .= "\n" . ($i +1)  . ": " . $_POST["items"][$i];
	}

	$msg .= "\nTHANK YOU";
	$msg .= "\nCreated with http://www.willtan.tech/santa-wishlist.php";
	
	if(mail($_POST["email"],$subject,$msg,$headers))
	{
		echo "Wishlist Sucessfully submitted!";
	}else{
		echo "Something failed for some reason";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Wishlist Submission</title>
	<link rel="stylesheet" href="style/global.css">
	<link rel="stylesheet" href="style/header.css">
	<link rel="stylesheet" href="style/nav.css">
	<link rel="stylesheet" href="style/footer.css">
	<link rel="stylesheet" href="style/santa-wishlist.css">
</head>

<body>
	<?php require 'header.php' ?>
	<?php require 'nav.php' ?>

	<div class="mainContent appContainer">
		<?php sendMail() ?>
	</div>

	<?php require 'footer.php' ?>
</body>

</html>