<?php
    session_start();  
    include "../conn.php";
	// echo "<pre>";
	// print_r($_SESSION);
	// echo "<hr>";
	// print_r($_POST);
	// echo "</pre>";
	$wage = $_POST["wage"]; 
	$comment = $_POST["comment"];
	 
 
	$sql2 = "SELECT MAX(o_id) AS o_id FROM orders";
	$query2	= mysqli_query($con, $sql2);
	$row = mysqli_fetch_array($query2);
	$o_id = $row['o_id'];
	
	
	foreach($_SESSION['cart'] as $sp_id=>$qty)
	 
	{
		$sql3	= "SELECT * FROM dataspare where sp_id=$sp_id";
		$query3 = mysqli_query($con, $sql3);
		$row3 = mysqli_fetch_array($query3);
		$total=$row3['sp_price']*$qty;
		$sp_bl=$row3['sp_balance']-$qty; //จำนวนในสต๊อก

		
		
		$sql4	= "INSERT INTO  orders_details 
		values(null, 
		'$o_id', 
		'$sp_id', 
		'$qty', 
		'$total',
		'$wage',
		'$comment'
		)";
		$query4	= mysqli_query($con, $sql4);

		// //ลดจำนวนในสต๊อ

		$sql5=" UPDATE dataspare SET sp_balance = '$sp_bl' WHERE sp_id = $sp_id";
		$query5	= mysqli_query($con, $sql5);

		//




		$sql6 = "SELECT orders.*,orders_details.*,dataspare.*
			FROM ((orders 
			INNER JOIN orders_details on orders.o_id=orders_details.o_id) 
			INNER JOIN dataspare on dataspare.sp_id=orders_details.sp_id) 
			where orders.o_id=$o_id;";  //รับค่าตัวแปร  ที่ส่งมา
			$rs6 = mysqli_query($con, $sql6) ;
			$rs6 = mysqli_query($con, $sql6) ;
			$row6 = mysqli_fetch_array($rs6);

/////////////////////////////////////////////////////////////////////////////////
							
			// 				$total2=0;
			// 				while($row6=mysqli_fetch_array($rs6)){
			// 					$total=$row6['total'];
			// 					$wage=$row6['wage'];
							
			// 					$sum = $row6['total']	;
			// 					$total2 += $sum;
			// 					$sum2 = $total2+$wage	;
			// 				}										
							
											
			// $sql6 = "UPDATE orders_details SET total = $sum2 where o_id = $o_id";	
			// $query6	= mysqli_query($con, $sql6);										
	}


	if($query4){
		mysqli_query($con, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $sp_id)
		{	
			unset($_SESSION['cart']);
		}
	}
	 else{
	 	mysqli_query($con, "ROLLBACK");  
	 	$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	 }

	mysqli_close($con);
?>

<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='slip.php?o_id=<?=$o_id?>';
</script>



