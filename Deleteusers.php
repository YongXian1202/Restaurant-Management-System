<?php
		include "connectdb.php";
		$id=intval($_GET['id']);
		$sql="DELETE FROM user WHERE User_ID=$id";
		$result=mysqli_query($conn, $sql);
		
		if(mysqli_affected_rows($conn)<=0)
		{
		echo "<script>alert('Unable to delete data!');";
		die ("window.location.href='ManageUsers.php';</script>");
		}
		else
		echo "<script>alert('Data deleted!');</script>";
		echo "<script>window.location.href='ManageUsers.php';</script>";
		?>