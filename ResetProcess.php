<?php
  include "connectdb.php";
if (!empty($_POST['table_id'])) {
  $string = implode($_POST['table_id']); //convert the array to string
  $checked = rtrim($string, ',');

  $sql = "Update tables SET " .
    "Table_Status = 'Occupied' " .
    "WHERE Table_ID IN (".$checked.") AND NOT Table_Status = 'Booked'; ";
  mysqli_query($conn, $sql);
  if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Successfully Updated!');window.history.go(-1);</script>";
  } else {
    echo "<script>alert('The table is occupied!');window.history.go(-1);</script>";
  }

  $sql1 = "Update tables SET " .
    "Table_Status = 'Free' " .
    "WHERE Table_ID NOT IN(".$checked.") AND NOT Table_Status = 'Booked';";
  mysqli_query($conn, $sql1);
  if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Successfully Updated!');window.history.go(-1);</script>";
  } else {
  }

} else {
  $sql2="Update tables SET " .
  "Table_Status = 'Free' " .
  "WHERE NOT Table_Status = 'Booked';";
  mysqli_query($conn,$sql2);
  if(mysqli_affected_rows($conn)>0){
  echo "<script>alert('Successfully Updated!');window.history.go(-1);</script>";
  }
  else{
  }
}
?>