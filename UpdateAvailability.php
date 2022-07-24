<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating...</title>
</head>

<body>
    <?php
    include "connectdb.php";
    if (!empty($_POST['item_id'])) {
        $string = implode($_POST['item_id']); //convert the array to string
        $checked = rtrim($string, ',');

        $sql = "UPDATE item SET Availability = 'Available' WHERE Item_ID IN (" . $checked . ");";
        mysqli_query($conn, $sql);

        $sql1 = "UPDATE item SET Availability = 'Unavailable' WHERE Item_ID NOT IN (" . $checked . ");";
        mysqli_query($conn, $sql1);
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Successfully update Items Availability!');window.history.go(-1);</script>";
            
        }
         else {
            echo "<script>alert('Successfully update Items Availability!');window.history.go(-1);</script>";
        }
    } else {
        $sql2 = "UPDATE item SET Availability = 'Unavailable';";
        mysqli_query($conn, $sql2);
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Successfully update Items Availability!');window.history.go(-1);</script>";
        } 
        else {
            echo "<script>alert('Successfully update Items Availability!');window.history.go(-1);</script>";
            
        }
    }
    ?>
</body>

</html>