<?php
	session_start();
	$user_id = $_SESSION['User_ID'];
	$table_id = $_POST['table_id'];
	$order_id = $_POST['order_id'];
	$order_type = $_POST['order_type'];

	date_default_timezone_set("Singapore");
	$date = date("Y/m/d");
	$time = date("H:i:s");

	include "connectdb.php";

	$sql5 = "SELECT Order_ID FROM orders WHERE Order_ID = " . $order_id . ";";
	$result5 = mysqli_query($conn, $sql5);
	if (mysqli_num_rows($result5) <= 0) {

		$sql = "SELECT SUM(Amount) as Price FROM order_item WHERE Order_ID = '" .$order_id. "';";
		$result = mysqli_query($conn, $sql);
		while ($rows = mysqli_fetch_array($result)) {
			$price = $rows['Price'];
		}

		$sql1 = "INSERT INTO orders(Order_ID, Date, Time, Order_Type, Total_Amount, Table_ID, User_ID) VALUES " .
			    "('" .$order_id. "', '" .$date. "','" .$time. "','" .$order_type. "','" .$price. "','" .$table_id. "', '" .$user_id. "');";
		$result1 = mysqli_query($conn, $sql1);

		$sql3 = "UPDATE order_item SET OrderedItem_Status = 'Cooking' WHERE Order_ID = '" .$order_id. "';";
		$result3 = mysqli_query($conn, $sql3);

		if (mysqli_affected_rows($conn) > 0) {
			$sql2 = "UPDATE tables SET Table_Status = 'Occupied' WHERE Table_ID = '" .$table_id. "'; ";
			$result2 = mysqli_query($conn, $sql2);
			echo "<script>alert('Successful send the order!');window.location.href='TableOrder.php';</script>";
			unset($_SESSION["shopping_item"]);
			unset($_SESSION["table_id"]);
		} else {
			echo "<script>alert('Please enter at least 1 item!');window.history.go(-1);</script>";
		}
	} else { 
		$sql4 = "UPDATE orders SET Total_Amount = '" .$price. "' WHERE Order_ID = '" .$order_id. "';";
		$result4 = mysqli_query($conn, $sql4);

		$sql3 = "UPDATE order_item SET OrderedItem_Status = 'Cooking' WHERE Order_ID = '" .$order_id. "';";
		$result3 = mysqli_query($conn, $sql3);

		if (mysqli_affected_rows($conn) > 0) {
			echo "<script>alert('Successful add the order!');window.location.href='TableOrder.php';</script>";
			unset($_SESSION["shopping_item"]);
		} else {
			echo "<script>alert('Please enter at least 1 item!');window.history.go(-1);</script>";
		}
	}

	?>