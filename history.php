<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8"><script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="BBS.css">

</head>
<body style="background-image:url(history_img.jpg);
        
        height:100vh;
        background-size: cover;>
	<header>
	        <div class = "main">
						<div class="logo" style="float: left;"> 
							<img src="logo.jpg" alt="logo">
						</div>
						<ul class="pages" style="max-width: 1200px;
                                                	margin:auto;	top:1%;">
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
			$result = $mysqli->query("SELECT `transfer_from`, `transfer_to`, `date`, `transfer_amount` FROM transaction_hist") or die(mysql_error($mysqli));
			?>
			</br>
			</br>
			</br>
			<div class="row justify-content-center" id="hist_table">
			 	<table style="color: #fff;"class="table">
			 		<thead>
			 			<tr>
			 				<th>From</th>
			 				<th>To</th>
			 				<th>Date</th>
			 				<th>Amount</th>
			 			</tr>
			 		</thead>
			<?php 
					while ($row = $result->fetch_assoc()): ?>
						<tr>
							<td><?php echo $row['transfer_from']; ?></td>
							<td><?php echo $row['transfer_to']; ?></td>
							<td><?php echo $row['date']; ?></td>
							<td><?php echo $row['transfer_amount']; ?></td>
						</tr>
						<?php endwhile; ?>
			 	</table>
			 </div>
			
		</div>
	</main>
	
</body>
<script type="text/javascript">
$(document).ready(function () {
  $('#hist_table').DataTable({"pagingType": "simple_numbers"});
  $('.dataTables_length').addClass('bs-select');
});
</script>
</html>