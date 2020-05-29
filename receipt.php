<?php
	session_start();
	if ($_SESSION["movie"] == "" || $_SESSION["seats"] == "" || $_SESSION["cust"] == "" ) {
		$newURL = "./index.php";
		header('Location: '.$newURL);   
	}
	// var_dump($_SESSION);



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Receipt</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <style>
  	.wrap{
  		width: 800px;
  		margin: 0 auto;
  	}
  	.wrap p{
  		margin-top:30px;
		font-weight: bold;
		font-size: 20px;
		text-align: center;
  	}
  	fieldset{
  		border: 1px solid #000;
  		padding: 5px 10px;
  		min-height: 200px;
  	}
  	legend{
  		width: initial;
  	}
  	.button-form{
  		margin-top: 20px;
  	}
  	@media print {
	  #printPageButton {
	    display: none;
	}

	}
  </style>
</head>
<body>
	<div class="container">
		<div class="wrap">
			<p>Receipt of <?= $_SESSION["movie"]["namemovie"] ?></p>
			<div class="row">
				<div class="col-md-6">
					<fieldset class="form-cus">
	    				<legend>Customer:</legend>
						<div class="row">
							<div class="col-md-4">
								Name:
							</div>
							<div class="col-md-8">
								<span><?= $_SESSION["cust"]["name"] ?></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Email:
							</div>
							<div class="col-md-8">
								<span><?= $_SESSION["cust"]["email"] ?></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Mobile:
							</div>
							<div class="col-md-8">
								<span><?= $_SESSION["cust"]["mobile"] ?></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Card:
							</div>
							<div class="col-md-8">
								<span><?= $_SESSION["cust"]["card"] ?></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Expiry:
							</div>
							<div class="col-md-8">
								<span><?= $_SESSION["cust"]["expiry"] ?></span>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-md-6">
					<fieldset class="form-movie">
	   					<legend>Movie:</legend>
						<div class="row">
							<div class="col-md-4">
								Name:
							</div>
							<div class="col-md-8">
								<span><?= $_SESSION["movie"]["namemovie"] ?></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Day:
							</div>
							<div class="col-md-8">
								<span><?= $_SESSION["movie"]["day"] ?></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Hour:
							</div>
							<div class="col-md-8">
								<span><?= $_SESSION["movie"]["hour"] ?></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Seats:
							</div>
							<div class="col-md-8">
								<span><?= (empty($_SESSION["seats"]["FCA"])) ? "" : $_SESSION["seats"]["FCA"]." First Class Adult," ?> </span>
								<span><?= (empty($_SESSION["seats"]["FCP"])) ? "" : $_SESSION["seats"]["FCP"]." First Class Concession," ?> </span>
								<span><?= (empty($_SESSION["seats"]["FCC"])) ? "" : $_SESSION["seats"]["FCC"]." First Class Children," ?> </span>
								<span><?= (empty($_SESSION["seats"]["STA"])) ? "" : $_SESSION["seats"]["STA"]." Standard Adult," ?> </span>
								<span><?= (empty($_SESSION["seats"]["STP"])) ? "" : $_SESSION["seats"]["STP"]." Standard Concession," ?> </span>
								<span><?= (empty($_SESSION["seats"]["STC"])) ? "" : $_SESSION["seats"]["STC"]." Standard Children," ?> </span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Total:
							</div>
							<div class="col-md-8">
								<span><?= $_SESSION["total"] ?> $</span>
							</div>
					</fieldset>					
				</div>
			</div> <!-- End row  -->
			<div class="row button-form">
				<div class="col-md-12">
					<button id="printPageButton" onclick="printReceipt()">Print </button>
				</div>
			</div>
		</div>
	</div>
	<script>
		function printReceipt(){
			window.print();
		}
	</script>
</body>
</html>