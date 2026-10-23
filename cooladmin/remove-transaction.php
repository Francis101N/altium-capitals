<?php
 include ('connect.php');

  $id= $_GET['id'];

  $query = "delete from $tab_transact where id = $id ";
  $result = mysqli_query($conn,$query);
  include('update_account.php');
  exit;
?>
