<?php
	if(!isset($_SESSION['logged_user'])){
		header('location:login');
	}

	$sumSold = 0;
	$sumPending = 0;
	$sum = 0;
	$commission = 0;
	foreach ($items as $item) {
		$sum += $item['price'];
		if ($item['status'] == 'Sold') {
			$sumSold += $item['price'];				
		}
		if ($item['status'] == 'Pending') {
			$sumPending += $item['price'];				
		}
	}
	$commission = 0.1*$sumSold;
?>

<div class="container pt-3 pb-3" id="printing">
	<h3 class="pb-3">Report</h3>

	<div class="row col-md-5">
		<div class="col-md-9">
			<p>Total No. of Items:</p>
			<p>No. of Sold Items:</p>
			<p>No. of Pending Items:</p>
			<p>Total Sum of Items:</p>
			<p>Total Sum of Sold Items:</p>
			<p>Total Sum of Pending Items:</p>
			<p>Total Commission for Fotheby:</p>
		</div>
		<div class="col-md-1">
			<p><?php echo $items->rowCount(); ?></p>
			<p><?php echo $solds->rowCount(); ?></p>
			<p><?php echo $pending->rowCount(); ?></p>
			<p><?php echo '£'.$sum; ?></p>
			<p><?php echo '£'.$sumSold; ?></p>
			<p><?php echo '£'.$sumPending; ?></p>
			<p><?php echo '£'.$commission; ?></p>
		</div>
	</div>
	<div class="col-md-5 text-center p-3">
		<button class="btn btn-lg btn-warning pl-5 pr-5" onclick='printDiv();'>Print</button>
	</div>
</div>

<script type="text/javascript">
	function printDiv() {
		// var printingContent = document.getElementById(printing).innerHTML;    
		// var fullPage = document.body.innerHTML;      
		// document.body.innerHTML = printingContent;     
		// window.print();     
		// document.body.innerHTML = fullPage;

		window.print();
   	}
</script>