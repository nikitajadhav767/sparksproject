<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
if(isset($_POST['done'])){
    $mysqli = new mysqli('localhost','id15551793_bank123','$o~llg3A@KvcJw(~','id15551793_sparksbank') or die(mysql_error($mysqli));

    // mysqli_autocommit($mysqli,FALSE);
    
    $transfer_from = $_POST['transfer_from'];
    $transfer_to = $_POST['transfer_to'];
    $transfer_amount = $_POST['transfer_amount'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date("d-m-Y H:i");
    $check_balance = "SELECT BALANCE FROM Details WHERE Name='$transfer_from'";
    $query_check = mysqli_query($mysqli,$check_balance);
    $res=mysqli_fetch_array($query_check);
    $res1=$res['BALANCE'];
 
    if($res1 > $transfer_amount){
    $q = "INSERT INTO transaction_hist (`transfer_from`, `transfer_to`, `date`, `transfer_amount`) VALUES ('".$transfer_from."','".$transfer_to."',STR_TO_DATE('".$date."','%d-%m-%Y %H:%i'),".$transfer_amount."); ";

    $update_from = "UPDATE Details SET BALANCE = BALANCE - '".$transfer_amount."' WHERE Name = '".$transfer_from."'; ";
	$update_to = "UPDATE Details SET BALANCE = BALANCE + '".$transfer_amount."' WHERE Name = '".$transfer_to."'; ";
	
	$query = mysqli_query($mysqli,$q) or die(mysqli_error($mysqli));
    $query_from = mysqli_query($mysqli,$update_from) or die(mysqli_error($mysqli));
	$query_to = mysqli_query($mysqli,$update_to) or die(mysqli_error($mysqli));



    if($query){
    	header("location:history.php");
        echo '<script type="text/JavaScript"> alert("Money Transfered Successfully.."); </script>';
		echo '<meta http-equiv="refresh" content="0">';
    } else{
        echo '<script type="text/JavaScript"> alert("Transfered Failed.."); </script>';
        echo '<meta http-equiv="refresh" content="0">';
    }
	}
 else{
    echo '<script type="text/JavaScript"> alert("Insufficient Balance.."); </script>';
    echo '<meta http-equiv="refresh" content="0">';
	}
}
?>

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
<body style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,102,204,0.5)),url(transfer_img.jpg);
        height:100vh;
        background-position: center;
        background-size: cover;">
	<header>
		<div class = "main">
						<div class="logo" style="float: left;"> 
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
			<form class="form-horizontal" method="POST" >
				<div class="form-group">
					<label class="control-label col"> From </label>
					<div class="col">
			            <select class="select" name="transfer_from" required>
				            <option disabled selected>-- Select Customer --</option>
				            <?php
								include 'conn.php';  
				                $names = mysqli_query($conn, "SELECT NAME From Details");   

				                while($data = mysqli_fetch_array($names))
				                {
				                    echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  
				                }	
				            ?>  
			            </select>
		            </div>		    
	        	</div>
	        	<div class="form-group">
	        		<label class="control-label col"> To </label>
	        		<div class="col">
			            <select class="select" name="transfer_to" required>
				            <option disabled selected>-- Select Customer --</option>
				            <?php
				                include 'conn.php';  
				                $records = mysqli_query($conn, "SELECT Name From Details");  

				                while($data = mysqli_fetch_array($records))
				                {
				                    echo "<option value='". $data['Name'] ."'>" .$data['Name'] ."</option>";
				                }	
				            ?> 
			            </select>
		            </div>		 
	        	</div>
	        	<div class="form-group">
		            <label class="control-label col"> Amount </label>
		            <div class="col">
		            	<input class="input1" type="text" name="transfer_amount" placeholder="Amount" required>
		        	</div>
		        </div>
	            <br> <br> <br>
	            <input class="btn btn-success" type="submit" name="done" value="Transfer">
    		</form> 
		</div>
	</main>
	
</body>
</html>