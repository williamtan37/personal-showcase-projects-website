<!DOCTYPE html>
<html>

<head>
	<title>Projects</title>
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
		<audio controls loop autoplay>
  			<source src="assets/felizNavidad.mp3" type="audio/mp3">
		</audio>
		<h2> What would you like for Christmas?</h2>
		<h3> We will send this list to your secret santa</h3>
		<form action="santa-wishlist-submitted.php" id="form1" method="post">
			Your Name:<br>
			<input type="text" name="name" required=""><br>
			Send List to (email):<br>
			<input type="text" name="email" required=""><br>
			<button id='add-item-button' type="button">Add Item</button>
			<input type="submit" value="Send List Now">
		</form>

	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="scripts/santa-wishlist.js"></script>

	<?php require 'footer.php' ?>
</body>

</html>