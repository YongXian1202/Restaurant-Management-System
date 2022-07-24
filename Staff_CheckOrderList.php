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
    <title>Bill</title>
    <style>

body{
    background-image: url();
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: #EDF6F9;
} 
 

        #container-right {
            float: right;
            width: 47%;
            margin: 1%;
        }
    
        #pmf {
            /*display: none;*/
            /*to hide the form*/
            width: 50%;
            margin: 1%;
        }
    
    
        #cash_form {
            display: none;
            /*to hide the form*/
            width: 50%;
            margin: 1%;
        }
    
        #container-left {
            float: left;
            width: 48.25%;
            margin: 1%;
            align-items: center;
            align-content: center;
        }
    
        table {
            margin: 1%;
        }
    
        input[type=text] {
            border: none;
        }
    
        #left-bottom {
            border: solid;
        }
    
        #df {
            display: none;
            float: bottom;
            z-index: 9;
            width: 47%;
            margin: 1%;
        }
        
        a{
    text-decoration:none;
    }
    
    .details th{
    background-color:#0B0742;
    color: #fdc094;
    }
    
    .details td{
    background-color: #0B0742;
    }
    
    .details input[type="text"]{
    background-color: #dedede;
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
    
    .orders{
    border-radius: 1vw;
    }
    
    .orders td{
    padding: 8px;
    }
    
    .orders tr{
    background-color: #dedede;
    }
          
    .orders tr:hover {
    background-color: #FDC094;
    transition:0.25s;
    }
          
    .orders th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0B0742;
    color: #fdc094;
    }
    
    .amount{
    border-radius: 1vw;
    }
    
    .amount td{
    padding: 8px;
    }
    
    .amount tr{
    background-color: #dedede;
    }
          
    .amount tr:hover {
    background-color: #fdc094;
    transition:0.25s;
    
    }
          
    .amount th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0B0742;
    color:#fdc094;
    }
    
    .amount input[type ="button"]{
    border:0;
    font-family:'Oleo Script';
    background: none;
    display: block;
    width:5vw;
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
    
    #container-left input[type ="button"]{
    border:0;
    font-family:'Oleo Script';
    background: none;
    display: block;
    width:5vw;
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
    
    .discount{
    border-radius: 1vw;
    }
    
    .discount td{
    padding: 8px;
    }
    
    .discount tr{
    background-color: #dedede;
    }
          
    .discount tr:hover {
    background-color: #aaff80;
    transition:0.25s;
    
    }
          
    .discount th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #0B0742;
    color:#fdc094;
    }
    
    .discount input[type ="button"]{
    border:0;
    font-family:'Oleo Script';
    background: none;
    display: block;
    width:5vw;
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
    
    .payment td{
    padding: 8px;
    }
    
    .payment tr{
    background-color: #dedede;
    align-items: center;
    text-align: center;
    }
          
    .payment tr:hover {
    background-color: #ffb380;
    transition:0.25s;
    
    }
          
    .payment th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color:  #0B0742;
    color:#fdc094;
    }

    .payment select{
    border:0;
    background: none;
    display: block;
    text-align: center;
    border: 3px solid #FF9190;
    width:5vw;
    color: black;
    border-radius: 24px;
    transition: 0.25s;
    position: sticky;
    -moz-appearance: textfield;
    }
    
    .payment input[type ="button"]{
    border:0;
    font-family:'Oleo Script';
    background: none;
    display: block;
    width:6vw;
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
    
    .last input[type ="submit"]{
    border:0;
    font-family:'Oleo Script';
    background: none;
    display: block;
    width:5vw;
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
    
    input[type = "number"]{
    border:0;
    background: none;
    display: block;
    text-align: center;
    border: 3px solid #FF9190;
    width:5vw;
    color: black;
    border-radius: 24px;
    transition: 0.25s;
    position: sticky;
    -moz-appearance: textfield;
    }
    
    input[type = "text"]{
    border:0;
    background: none;
    display: block;
    text-align: center;
    border: 3px solid #FF9190;
    width:5vw;
    color: black;
    border-radius: 24px;
    transition: 0.25s;
    position: sticky;      
    }

    input[type = "submit"]{
        border:0;
    font-family:'Oleo Script';
    background: none;
    display: block;
    width:8vw;
    height:2vw;
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

    </style>
</head>
<body>

<div class="img1">
<div class="text">
           <h2>Bill<h2>
</div>
</div>

    <div id="container-left">
        <center>
        <h1>Order List</h1>
        <form name="bill" action="Staff_PayBill.php" method="post">
            <?php
            include "connectdb.php";
            $table_id = $_GET['id'];


            $sql = "SELECT * FROM orders WHERE Table_ID = '" . $table_id . "' AND Customer_Pay IS NULL;";
            $result = mysqli_query($conn, $sql);


            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_array($result)) {

                    $order_id = $rows['Order_ID'];
                    $date = $rows['Date'];
                    $order_type = $rows['Order_Type'];
                }

                echo "<table width='95%' class='details'><tr>";
                echo "<th>Table</th><td><input type='text' name='table_id' value='" . $table_id . "' readonly></td>";

                date_default_timezone_set("Singapore");
                echo "<th>Date</th><td><input type='text' name='date' value='" . $date . "' readonly></td>";
                echo "<tr><th>Receipt ID</th><td><input type='text' name='order_id' value='" . $order_id . "' readonly></td>";
                echo "<th>Time</th><td><input type='text' name='time' value='" . date("H:i:s") . "' readonly></td></tr>";
                echo "<tr><th>Order Type</th><td><input type='text' name='order_type' value='" . $order_type . "' readonly></td></tr></table>";
                
                
            ?>
                <table width="95%" class="orders">
                    <tr>
                        <th>Item ID</th>
                        <th>Name</th>
                        <th>Comments</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Delete</th>
                    </tr>
                <?php

                $sql1 = "SELECT * FROM order_item WHERE Order_ID = '" . $order_id . "';";
                $result1 = mysqli_query($conn, $sql1);

                while ($rows = mysqli_fetch_array($result1)) {

                    echo "<tr>";
                    echo "<td>" . $rows['Item_ID'] . "</td>";
                    echo "<td>" . $rows['Item_Name'] . "</td>";
                    echo "<td>" . $rows['Comments'] . "</td>";
                    echo "<td>" . $rows['OrderedItem_Status'] . "</td>";
                    echo "<td>" . $rows['Quantity'] . "</td>";
                    echo "<td>" . $rows['Price'] . "</td>";
                    
                    echo "<td>" . $rows['Amount'] . "</td>";
                    echo "<td><a href='DeleteOrderItem.php?OrderItem_ID=" . $rows['OrderItem_ID'] . "'><center><img src='icon-delete.jpeg' alt='Remove Item'/></center></a></td>";
                    echo "</tr>";
                }
            } elseif (mysqli_num_rows($result) <= 0) {
                die("<script>alert('There are no order!');window.location.href='Staff_TableOrder.php';</script>");
            }
                ?>
                </table>

                <table class="amount">
                    <tr>
                        <th>Amount</th>
                        <td>RM</td><td> <input type="number" id="amount" name="amount" step="0.01" value="<?php
                            $sql2 = "SELECT sum(Quantity*Price) AS Total FROM order_item WHERE Order_ID='" . $order_id . "';";
                            $result2 = mysqli_query($conn, $sql2);

                            if (mysqli_num_rows($result2) <= 0) {
                                die("<script>alert('Technical Error');</script>");
                            }

                                while ($rows = mysqli_fetch_array($result2)) {
                                $total = $rows['Total'];
                                    echo number_format($total, 2);
                            }
                        ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>GST</th>
                        <td>RM</td><td> + <input type="number" id="GST" name="GST" value="<?php $GST = $total * 0.06;
                                                                                echo number_format($GST, 2); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><input type="button" onclick="document.getElementById('df').style.display = 'block'" value="Discount" readonly></td>
                        <td>
                            RM </td><td>-  <input type="number" name="discountamount" id="discountamount" step="0.01"  readonly></td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>RM</td><td> <input type="number" id="total_amount" step="0.01" value="<?php $total_vGST = $total + $GST;
                                                                                            echo number_format($total_vGST, 2); ?>" readonly></td>
                    </tr>
                </table>

                <div id="df">
                    <table class="discount">
                        <tr>
                            <th colspan="2">Discount</th>
                        </tr>
                        <tr>
                            <td> %</td>
                            <td><input type="number" step="0.01" id="discount_percent"></td>
                        <tr>
                            <td>RM</td>
                            <td><input type="number" step="0.01" id="discount_rm" maxlength="4"></td>
                        </tr>
                        <tr>
                            <td><input type="button" value="Cancel" onclick="document.getElementById('df').style.display = 'none'"></td>
                            <td><input type="button" value="Confirm" onclick="confirm_df()"></td>
                        </tr>
                    </table>
                </div>
                <a href="Staff_TableOrder.php"><input type="button" value="Back"></a>
            </center>
    </div>

    <div id="container-right">

        <center>
            <h1>Payment</h1>
        <div id="pmf">
            <table class="payment">
                <th colspan="2">Payment Method</th>
                <tr>
                <center>
                    <td><input type="button" onclick="cashform()" value="Select"></td>
                    </center>
                </tr>
                
            </table>
        </div>

        <div id="cash_form">
            <table class="payment">
                <tr>
                <th>Pay Method</th>
                <td><select name="paying_method">
							<option value="Cash">Cash</option>
							<option value="Credit Card">Credit Card</option>
						</select>
                </td>
                </tr>
                <th>Total</th>
                <td>RM <input type="number" id="actual_amount" name="actual_amount" step="0.01"></td>
                </tr>
                <tr>
                    <th>Pay</th>
                    <td>RM <input type="number" id="pay" name="customer_pay" step="0.01"></td>
                </tr>
                <tr>
                    <th>Balance</th>
                    <td>RM <input type="number" id="display_balance" name="balance" step="0.01"></textarea></td>
                </tr>
                <tr>
                    <th>Credit Card No</th>
                    <td>RM <input type="number" name="creditcard"></textarea></td>
                </tr>
                <tr>
                    <td><input type="button" onclick="back()" value="Cancel"></td>
                    <td><input type="button" onclick="confirm()" value="Calculate"></td>
                </tr>
            </table>
                <input type="submit" onclick="confirm()" value="Confirm">
        </div>

        
    </center>
    </div>


    <script>
        function discount() {
            document.getElementById("df").style.display = "block";

        }

        function dfcancel() {
            document.getElementById("df").style.display = "none";
        }

        function confirm_df() {
            var a = document.getElementById("discount_percent").value;
            var b = document.getElementById("discount_rm").value;
            var c = <?php echo number_format($total_vGST,2)?>;

            if (a === "") {
                var d = c - b;
                var f = d.toFixed(2);
                if (d < 0) {
                    alert("There are some error with discount amount!");
                } else {
                    document.getElementById("discountamount").value = b;
                    document.getElementById("total_amount").value = f;
                    document.getElementById("actual_amount").value = f;
                    document.getElementById("df").style.display = "none";
                }

            } else {
                var d = c * (a / 100);
                var e = c - d;
                var f = e.toFixed(2);

                document.getElementById("discountamount").value = d;
                document.getElementById("total_amount").value = f;
                document.getElementById("actual_amount").value = f;
                document.getElementById("df").style.display = "none";



            }

        }
    </script>

    <script>
        function cashform() {
            var h = document.getElementById("total_amount").value;
            document.getElementById("actual_amount").value = h;
            document.getElementById("cash_form").style.display = "block";

        }

        function back() {
            document.getElementById("cash_form").style.display = "none";
        }

        function confirm() {
            var x = document.getElementById("pay").value;
            var y = document.getElementById("actual_amount").value
            var z = x - y;
            var i = z.toFixed(2);
            document.getElementById("display_balance").value = i;

        }
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