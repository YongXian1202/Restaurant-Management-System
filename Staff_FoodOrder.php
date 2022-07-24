<?php
include "StaffHeader.php";
include "connectdb.php";
if(isset($_SESSION['User_ID'])) {
    $sql = "SELECT Name FROM user WHERE User_ID = '{$_SESSION['User_ID']}'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $row['Name'];
        
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food & Beverage Order</title>
	<style>
	body{
    background-image: url();
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: #EDF6F9;
} 
 
.img1{
    min-height: 45%;
}

.text{
    position:relative;
    top:30%;
    width:100%;
    text-align:center;
    color:#000;
    font-size:27px;
    letter-spacing:8px;
    text-transform: uppercase;
    font-family: 'Oleo Script';
    padding:50px;

}

.text .border{
    background-color:#EDF6F9;
    padding:20px;
    
}

.text .border.trans{
    background-color:  transparent;
}

.order-details{
	width:41%;
}

.order-details table{
	margin:5px;
	width:100%;
}

.order-details input[type = "text"]{
    border:0;
    background: none;
	display: block;
    text-align: center;
    border: 3px solid #FF9190;
    width:4vw;
    outline:none;
    color: black;
    border-radius: 24px;
	transition: 0.25s;
	position: sticky;
  }

.order-details select{
	border:solid;
	border:0;
    background: none;
	display: block;
    text-align: center;
    border: 3px solid #FF9190;
    width:8vw;
    outline:none;
    color: black;
    border-radius: 24px;
	transition: 0.25s;
	position: sticky;
	font-size:15px;
}

.conlanfirm input[type = "submit"], input[type="button"]{
	border:0;
    font-family:'Oleo Script';
    background: none;
    display: block;
    width:10vw;
    padding: 0.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.4rem;
    align-items: center;
    text-align: center;
    align-content: center;
    outline:none;
    cursor: pointer;
    transition: 0.25s;
}

input[name="addtocart"]:hover, input[name="search"]:hover, .conlanfirm input[type = "submit"]:hover,input[type="button"]:hover{
	transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2);
    transform: scale(0.9);
}

input[name="addtocart"]:active, input[name="search"]:active, .conlanfirm input[type = "submit"]:active,input[type="button"]:active{
	transform:translateY(0);
    box-shadow: none;
}

textarea[name="remarks"]{
	border:0;
    background: none;
	display: block;
    text-align: center;
    border: 3px solid #FF9190;
    width:14vw;
    outline:none;
    color: black;
	transition: 0.25s;
	position: sticky;
}

input[name="itemname"]{
	border:0;
    background: none;
	display: block;
    text-align: center;
    border: 3px solid #FF9190;
	width:10vw;
	height: 2vw;
    outline:none;
    color: black;
    border-radius: 24px;
	transition: 0.25s;
	position: sticky;
}

input[name="search"]{
	border:0;
    font-family:'Oleo Script';
    background: none;
    display: block;
    width:10vw;
    padding: 0.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.4rem;
    align-items: center;
    text-align: center;
    align-content: center;
    outline:none;
    cursor: pointer;
    transition: 0.25s;
}

input[name="addtocart"]{
	border:0;
    font-family:'Oleo Script';
    background: none;
    display: block;
    width:8vw;
    background-color:#0B0742;
    border-radius: 2rem;
    text-transform:uppercase;
    color: #fdc094;
    font-size: small;
    align-items: center;
    text-align: center;
    align-content: center;
    outline:none;
    cursor: pointer;
    transition: 0.25s;
}

#shopping-cart {
	margin: 5px;
	width:45%;
	float:left;
}

#product-grid {
	margin: 5px;
	width: 50%;
	float:right;
}

#shopping-cart table {
	width: 100%;
	background-color: #F0F0F0;

}

#shopping-cart table td {
	background-color: #FFFFFF;
}

.txt-heading {
	color: #211a1a;
	font-size: large;
	font-family: 'Oleo SCript';
	border-bottom: 1px solid #E0E0E0;
	overflow: auto;
}

#btnEmpty {
	background-color: #ffffff;
	border: #d00000 1px solid;
	padding: 5px 10px;
	color: #d00000;
	float: right;
	text-decoration: none;
	border-radius: 3px;
	margin: 10px 0px;
}

.btnAddAction {
    padding: 5px 10px;
    background-color: #efefef;
    border: #E0E0E0 1px solid;
    color: #211a1a;
	margin-top: 10px;
    text-decoration: none;
    border-radius: 3px;
    cursor: pointer;
}

#product-grid .txt-heading {
	margin-bottom: 18px;
}

.product-item {
	float: left;
	background: #ffffff;
	margin: 30px 30px 0px 20px;
	border: #E0E0E0 1px solid;
}

.search-item {
	font-family:'Oleo Script';
	float: left;
	background: #ffffff;
	margin: 30px 30px 0px 0px;
	border: #E0E0E0 1px solid;
}

.product-image {
	height: 155px;
	width: 250px;
	background-color: #FFF;
}

.clear-float {
	clear: both;
}

.demo-input-box {
	border-radius: 2px;
	border: #CCC 1px solid;
	padding: 2px 1px;
}

.tbl-cart {
	font-size: 0.9em;
}

.tbl-cart th {
	font-weight: normal;
}

.product-title {
	font-family:'Oleo Script';
	margin-bottom: 10px;
}

.product-price {
	font-family:'Oleo Script';
	float:left;
	margin-bottom: 1vw;
}

.cart-action {
	float: right;
}

.product-quantity {
    padding: 5px 10px;
    border-radius: 3px;
    border: #E0E0E0 1px solid;
}

.product-remark{
	margin-top:5px;
	margin-bottom: 10px;
	width:100%;
}

.product-tile-footer {
    padding: 15px 15px 0px 15px;
    overflow: auto;
}

.cart-item-image {
	width: 30px;
    height: 30px;
    border-radius: 50%;
    border: #E0E0E0 1px solid;
    padding: 5px;
    vertical-align: middle;
    margin-right: 15px;
}
.no-records {
	text-align: center;
	clear: both;
	margin: 38px 0px;
}	

a{
    text-decoration:none;
}
* {
  box-sizing: border-box;
}

form.Search input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}
form.Search button {
  float: left;
  width: 20%;
  padding: 10px;
  background: black;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.Search button:hover {
  background: grey;
}

form.Search::after {
  content: "";
  clear: both;
  display: table;
}
	</style>
</head>

<body>

<div class="text">
            Order
</div>
</div>
	<div class="order-details">
		<form action="Staff_ReceiveOrderFormat.php" method="post">
			<table cellpadding="15">
				<tr>
					
						<?php
						include "connectdb.php";
						$user_id = $_SESSION["User_ID"]; 
						if (!empty($_GET["table_id"])) { 
							$_SESSION["table_id"] = $_GET["table_id"]; 

						}

						if (!empty($_SESSION["table_id"])) { 
							$table_id = $_SESSION["table_id"];
							echo "<th>Table:</th><td><input type ='text' name='table_id' value='" . $table_id. "' readonly></td>";
						} else {   
							echo "<script>alert('Please select a table!');window.history.go(-1);</script>";
						}

						$sql = "SELECT * FROM orders WHERE Customer_Pay = '' AND Table_ID = " . $table_id . ";";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							while ($rows = mysqli_fetch_array($result)) {
								$order_id = $rows["Order_ID"];
								echo "<th> Order ID:</th><td><input type='text' name='order_id' value='" . $order_id . "' readonly></td>";
							}
						} else {
							$sql1 = "SELECT Order_ID FROM orders ORDER BY Order_ID DESC LIMIT 1;";
							$result1 = mysqli_query($conn, $sql1);
							if (mysqli_num_rows($result1) <= 0) {
								$order_id = 1;
								echo "<th> Order ID: </th><td><input type='text' name='order_id' value='" . $order_id . "' readonly></td>";
							} else {
								while ($rows = mysqli_fetch_array($result1)) {
									$order_id = $rows["Order_ID"] + 1;
									echo "<th> Order ID: </th><td><input type='text' name='order_id' value='" . $order_id . "' readonly></td>";
								}
							}
						}

						?>
						<th>Order Type:</th>
					<td>
						<select name="order_type">
							<option value="Dine-In">Dine-In</option>
							<option value="Take Away">Take Away</option>
						</select>
					</td>
					<td class="conlanfirm"><input type="submit" value="Confirm"/></td>
					<td class="conlanfirm"><a href="Staff_TableOrder.php"><input type="button" value="Back"></a></td>


			</table>
	</div>
	
	</form>
	<?php
	?>
	<?php
	if (!empty($_GET["action"])) {
		switch ($_GET["action"]) {
			case "add":
				if (!empty($_POST["quantity"])) {
					if (!empty($_POST["comments"])) {
						$comments = $_POST["comments"];
					} else {
						$_POST["comments"] = "No Comments";
						$comments = $_POST["comments"];
					}
					include "connectdb.php";
					$sql = "SELECT * FROM item WHERE Item_ID ='" . $_GET["id"] . "';";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($rows = mysqli_fetch_array($result)) {
							$item_id = $rows["Item_ID"];
							$item_name = $rows["Item_Name"];
							$unit_price = $rows["Price"];
							$item_image = $rows["Image"];
						}
					} else {
						echo "<script>alert('result');</script>";
					}
					$quantity = $_POST["quantity"];
					$total_quantity = 0;
					$total_price = 0;
					$item_price =$unit_price;
					$total_quantity += $quantity;
					$total_price += ($item_price * $total_quantity);

					$sql2 = "INSERT INTO order_item(Item_ID, Order_ID, Item_Name, Comments, OrderedItem_Status, Price, Quantity, Amount) VALUES ('" . $item_id . "', '" . $order_id . "', '" . $item_name . "','" . $comments . "','Pending','" . $unit_price . "','" . $quantity . "', '" . $total_price . "')";
					mysqli_query($conn, $sql2);
					if (mysqli_affected_rows($conn) > 0) {
					} else {
						
						echo "<script>alert('Technical Error!');</script>";
					}

					$sql3 = "SELECT item.Item_ID, item.Item_Name, item.Price, item.Availability, item.Image, order_item.OrderItem_ID, order_item.OrderedItem_Status, order_item.Quantity, order_item.Amount FROM item, order_item WHERE item.Item_ID = order_item.Item_ID ORDER BY order_item.OrderItem_ID;";
					$result3 = mysqli_query($conn, $sql3);
					if (mysqli_num_rows($result3) > 0) {
						while ($rows = mysqli_fetch_array($result3)) {
							$orderitem_id = $rows["OrderItem_ID"];
						}
					} else {
						echo "<script>alert('Technical Error');</script>";
					}


					$itemArray = array($orderitem_id => array('ordered_code' => $orderitem_id, 'code' => $item_id, 'name' => $item_name, 'comments' => $comments, 'price' => $item_price, 'quantity' => $quantity,  'image' => $item_image));

					if (empty($_SESSION["shopping_item"])) {
						$_SESSION["shopping_item"] = $itemArray; 
					} else {
						$_SESSION["shopping_item"] = array_merge($_SESSION["shopping_item"], $itemArray); 

					}
				}
				break;
			case "remove":
				if (!empty($_SESSION["shopping_item"])) {
					foreach ($_SESSION["shopping_item"] as $k => $v) {
						if ($_GET["id"] == $_SESSION['shopping_item'][$k]['ordered_code']) {
							$sql3 = "DELETE FROM order_item WHERE OrderItem_ID = '" . $_SESSION['shopping_item'][$k]['ordered_code'] . "' AND Order_ID = '" . $order_id . "' ;";
							mysqli_query($conn, $sql3);

							unset($_SESSION["shopping_item"][$k]); 
						}
						if (empty($_SESSION["shopping_item"]))
							unset($_SESSION["shopping_item"]);
					} 
				} 
				break;
		}
	}
	?>
	
	<div id="shopping-cart">
		<div class="txt-heading" style="margin-top:6px;">Order Cart</div>
		<?php 
		if (isset($_SESSION["shopping_item"])) {
			$total_quantity = 0;
			$total_price = 0;
		?>
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
				<tbody>
					<tr>
						<th style="text-align:left;">Name</th>
						<th style="text-align:left;">Comments</th>
						<th style="text-align:right;" width="10%">Quantity</th>
						<th style="text-align:right;" width="10%">Unit Price</th>
						<th style="text-align:right;" width="10%">Price</th>
						<th style="text-align:center;" width="10%">Remove</th>
					</tr>
					<?php		//Display in cart table
					foreach ($_SESSION["shopping_item"] as $item) {
						$item_price = $item["price"] * $item["quantity"];

					?>
						<tr>
							<td><img src="\FYP/<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
							<td><?php echo $item["comments"]; ?></td>
							<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
							<td style="text-align:right;"><?php echo "RM " . $item["price"]; ?></td>
							<td style="text-align:right;"><?php echo "RM " . number_format($item_price, 2); ?></td>
							<td style="text-align:center;"><a href="Staff_FoodOrder.php?action=remove&id=<?php echo $item["ordered_code"]; ?>" class="btnRemoveAction"><img src="icon-delete.jpeg" alt="Remove Item" /></a></td>
						</tr>
					<?php
						$total_quantity += $item["quantity"];
						$total_price += ($item["price"] * $item["quantity"]);
					}
					?>

					<tr>
						<td colspan="2" align="right">Total:</td>
						<td align="right"><?php echo $total_quantity; ?></td>
						<td align="right" colspan="2"><strong><?php echo "RM " . number_format($total_price, 2); ?></strong></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		<?php
		} else {
		?>
			<div class="no-records">Your Cart is Empty</div>
		<?php
		}
		?>
	</div>


		<p><div class="txt-heading">Products</div>
		<form action="Staff_FoodOrder.php" method="post">
			<table>
				<tr>
			<th>Name: </th><td><input type="text" id="itemname" name="itemname" placeholder="Enter Item Name" /></td>
			<td><input name="search" type="submit" value="Search" onclick=" var x = document.getElementById('itemname').value;
	if(x ===''){
		alert('Please enter an item name!');
	}
" /></td>
</tr>
</table>
		</form>
		<?php
		include "connectdb.php";

		if (!empty($_POST['itemname'])) {
			$itemname = $_POST['itemname'];

			$sql5 = "SELECT * FROM item WHERE Item_Name LIKE '%" . $itemname . "%';";
			$result5 = mysqli_query($conn, $sql5);
			if (mysqli_num_rows($result5) > 0) {
				while ($rows = mysqli_fetch_array($result5)) {
		?>

					<div class="search-item">
						<form method="post" action="Staff_FoodOrder.php?action=add&id=<?php echo $rows["Item_ID"]; ?>">
							<div class="product-image"><img src="\FYP/<?php echo $rows["Image"]; ?>" width="250px" height="155px"></div>
							<div class="product-tile-footer">
								<div class="product-title"><?php echo $rows["Item_Name"]; ?></div>
								<div class="product-price"><?php echo "RM" . $rows["Price"]; ?>
									<input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input name="addtocart" type="submit" value="Add" class="btnAddAction" /></div>
								<br />
								<textarea rows=3 id="remarks" name="remarks" class="product-remark" placeholder="Remarks"></textarea>
							</div>
						</form>
					</div>
		<?php
				}
			} else {
				echo "<p align = 'left'>No result!</p>";
			} 
		} else {
		}
		?>

		<?php
		$sql1 = "SELECT * FROM item;";
		$result1 = mysqli_query($conn, $sql1);
		while ($rows = mysqli_fetch_array($result1)) {
			if($rows['Availability']=="Unavailable"){
		
		?>
			<div class="product-item">
				<form method="post" action="Staff_FoodOrder.php?action=add&id=<?php echo $rows["Item_ID"]; ?>">
					<div class="product-image"><img src="\FYP/<?php echo $rows["Image"]; ?>" width="250px" height="155px"></div>
					<div class="product-tile-footer" style= "background:#d00000">
						<div class="product-title"><?php echo $rows["Item_Name"]; ?></div>
						<div class="product-price"><?php echo "RM" . $rows["Price"]; ?>
							<input type="text" class="product-quantity" name="quantity" value="1" size="2" readonly/><input type="submit" name="addtocart" value="Add" class="btnAddAction" style="background:grey; color:black;" disabled/></div>
						<br /><textarea rows=3 id="remarks" name="remarks" class="product-remark" placeholder="Remarks" readonly></textarea>
					</div>
				</form>
			</div>
		<?php
			}
			else{
				?>
			<div class="product-item">
				<form method="post" action="Staff_FoodOrder.php?action=add&id=<?php echo $rows["Item_ID"]; ?>">
					<div class="product-image"><img src="\FYP/<?php echo $rows["Image"]; ?>" width="250px" height="155px"></div>
					<div class="product-tile-footer">
						<div class="product-title"><?php echo $rows["Item_Name"]; ?></div>
						<div class="product-price"><?php echo "RM" . $rows["Price"]; ?>
							<input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" name="addtocart" value="Add" class="btnAddAction"/></div>
						<br /><textarea rows=3 id="remarks" name="remarks" class="product-remark" placeholder="Remarks"></textarea>
					</div>
				</form>
			</div>


				<?php
			}
		}
		?>
	</div>
	</script>
	</body>

</html>
<?php
}
else{
    header("Location: login.php");
    exit();
}
?>