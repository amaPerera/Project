<!DOCTYPE html>
<html>
    <head>
    <title>PayPal Transaction Suceeded</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
    </head>
    <body>
        <?php include 'temp/header.php';  
        require "dbcon/dbcon.php"; 	

		//Store transaction information from PayPal
		$res_id = $_GET['reservation_id']; 
		$item_name = $_GET['item_name']; 
		$txn_id = $_GET['tx'];
		$total_amount = $_GET['amt'];
		$currency_code = $_GET['cc'];
		$payment_status = $_GET['st'];

		//Get product price
		$result = mysqli_query("SELECT total FROM reservations WHERE res_id = $res_id",$conn);
		$row = mysqli_fetch_assoc($result);
		$total = $row['total'];

		if(!empty($txn_id) && $total_amount == $total){
			//Check if payment data exists with the same TXN ID.
		    $prevPaymentResult = mysqli_query("SELECT payment_id FROM payments WHERE txn_id = '".$txn_id."'",$conn);

		    if(mysqli_num_rows($prevPaymentResult) > 0){
		        $paymentRow = mysqli_fetch_assoc($prevPaymentResult);
		        $last_insert_id = $paymentRow['payment_id'];
		    }else{
		        //Insert tansaction data into the database
		        $insert = mysqli_query("INSERT INTO payments(resid,item_name,txn_id,total_amount,currency_code,payment_status) VALUES('".$res_id."','".$item_name."','".$txn_id."','".$total_amount."','".$currency_code."','".$payment_status."')");
		        $last_insert_id =mysqli_insert_id($conn);
		    }
		?>
			<center><h1 style="background-color:#000000;color:white"> Your PayPal transaction has been suceeded. </h1></center>
		    <h1>Your Payment ID - <?php echo $last_insert_id; ?>.</h1>
		<?php
		}else{
		?>
			<center><h1 style="background-color:#000000;color:white"> Your PayPal transaction has failed. </h1></center>
		<?php
		}
		?>
		<!--<?php #include 'temp/footer.php';  ?>-->
</body>
</html>