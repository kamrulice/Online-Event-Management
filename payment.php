<?php include 'inc/header.php'; ?>



 

<?php 
	$login = Session::get('customerLogin');
	if($login==false){
		header("location:login.php");
	}

?>
<div style="height:600px; margin-top:20px;">

<style>
	.payment{width:500px; min-height:200px; text-align:center; border:1px solid #ddd; margin:0 auto; padding:50px;}
	.payment h2{ border-bottom:1px solid #ddd; margin-bottom:40px; padding-bottom:10px; }
	.payment a{background:#ff0000 none repeat scroll 0 0; border-radius:3px; color:#fff; font-size:18px; padding:5px 30px; text-decoration:none; }
</style>


<div class="payment">
	<h2>Choose payment Option</h2>
	<a href="OnlinePayment.php">Online Payment</a>
	<a href="OfflinePayment.php">Offline Payment</a>
</div>
	
	 
<div style="margin:0 auto; text-align:center;">
<a href="cart.php"><button class="btn btn-primary">Previous</button></a>
</div>
</div>









<?php include"inc/footer.php";?>






















<?php include 'inc/footer.php'; ?>
