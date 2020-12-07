<!DOCTYPE html>
<html>

<head>
	<title>Play Whack-a-mole</title>
	<link rel="stylesheet" href="style/global.css">
	<link rel="stylesheet" href="style/header.css">
	<link rel="stylesheet" href="style/nav.css">
	<link rel="stylesheet" href="style/footer.css">
	<link rel="stylesheet" href="style/whack-a-mole.css">
</head>

<body>
	<?php require 'header.php' ?>
	<?php require 'nav.php' ?>


	<div class="mainContent appContainer">
		<h2> Whack-A-Mole - Are you fast enough?</h2>
		<div class="statusBar">
			<Button id= "startButton" type="button">Start! </Button>
			<span class="startScore">Score: <output id="score">0</output></span>
			<span >Life: <output id="life">5</output></span>
		</div>
		<div class="row">
			<div id= '00' class="square">
			</div>
			<div id= '01' class="square">
			</div>
			<div id= '02' class="square">
			</div>
			<div id= '03' class="square">
			</div>
			<div id= '04' class="square">
			</div>
			<div id= '05' class="square">
			</div>
			<div id= '06' class="square">
			</div>
			<div id= '07' class="square">
			</div>
		</div>
		<div class="row">
			<div id= '10' class="square">
			</div>
			<div id= '11' class="square">
			</div>
			<div id= '12' class="square">
			</div>
			<div id= '13' class="square">
			</div>
			<div id= '14' class="square">
			</div>
			<div id= '15' class="square">
			</div>
			<div id= '16' class="square">
			</div>
			<div id= '17' class="square">
			</div>
		</div>
		<div class="row">
			<div id='20' class="square">
			</div>
			<div id='21' class="square">
			</div>
			<div id='22' class="square">
			</div>
			<div id='23' class="square">
			</div>
			<div id='24' class="square">
			</div>
			<div id='25' class="square">
			</div>
			<div id='26' class="square">
			</div>
			<div id='27' class="square">
			</div>
		</div>
		<div class="row">
			<div id='30' class="square">
			</div>
			<div id='31' class="square">
			</div>
			<div id='32' class="square">
			</div>
			<div id='33' class="square">
			</div>
			<div id='34'class="square">
			</div>
			<div id='35' class="square">
			</div>
			<div id='36' class="square">
			</div>
			<div id='37' class="square">
			</div>
		</div>
	</div>


	<?php require 'footer.php' ?>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="scripts/whack-a-mole.js"></script>
</body>

</html>
