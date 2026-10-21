<title>Inter Regional Bank</title>  <?php
  // create short variable names
  $remove=$_POST['remove'];



  if (!$remove)
  {
     echo 'You have not entered the required account details.  Please <a href="update.htm">go back</a> and try again.<br>';
     exit;
  }
  

 include ('../connect.php');
  $query = "delete from error where accountnumber=".$remove;
  $result = mysqli_query($conn,$query);
  echo '<font size="-1" face="Verdana, Arial, Helvetica, sans-serif">';
  include ('header.php');
  echo 'Error message removed.';
 
?>
