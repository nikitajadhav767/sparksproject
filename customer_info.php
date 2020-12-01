<!DOCTYPE html>
<html lang = "en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="BBS.css">


</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,102,204,0.5)),url(details_img.jpg);
        height:100vh;
        background-position: center;
        background-size: cover;">
	<header>
	        <div class = "main">
						<div class="logo"> 
							<img src="logo.jpg" alt="logo">
						</div>
						<ul class="pages">
							<li><a href="index.html" >HOME</a></li>
							<li><a href="customer_info.php" >CUSTOMER DETAILS</a></li>
							<li><a href="transfer.php" >TRANSFER MONEY</a></li>
							<li><a href="history.php" >TRANSACTION HISTORY</a></li>
						</ul>
					</div>
			
	</header>
	<main>
		<div class="container">
			<?php 
				$mysqli = new mysqli('localhost','id15551793_bank123','$o~llg3A@KvcJw(~','id15551793_sparksbank') or die(mysql_error($mysqli));
				$result = $mysqli->query("SELECT * FROM Details") or die(mysqli_error($mysqli));
			 ?>
			 <div class="row justify-content-center">
			 	<table style="color: #fff;" class="table">
			 		<thead>
			 			<tr>
			 				
			 				<th>Name</th>
			 				<th>Email Address</th>
			 				<th>Account number</th>
			 				<th>Balance</th>
			 			</tr>
			 		</thead>
			<?php 
					while ($row = $result->fetch_assoc()): ?>
						<tr>
							<td><?php echo $row['NAME']; ?></td>
							<td><?php echo $row['EMAIL-ID']; ?></td>
							<td><?php echo $row['ACCOUNT NUMBER']; ?></td>
							<td><?php echo $row['BALANCE']; ?></td>
							
						</tr>
						<?php endwhile; ?>
			 	</table>
			 </div>
		</div>
	</main>
	<footer>
		
	</footer>
</body>
</html>