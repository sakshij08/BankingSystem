<?php
ob_start();
require_once "config.php";
session_start();
ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Banking-Home</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="home.css">
  <style type="text/css">
    a{
   text-decoration: none;
   color:#000; 
}
  </style>
	
</head>
<body>
	<?php include("nav.php") ?>
<div style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class=" text-center">
                    <h2>Customers</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="btn-toolbar">
    
</div>

<?php
require("config.php");

$sql= "SELECT id, name, email, balance from customer";

$result = $con->query($sql);

echo "
	<div class='well' style='background-color:#18bc9c;'>
    <table class='table' >
      <thead>
        <tr>
          <th>Acc Id</th>
          <th>Full name</th>
          <th>Email Id</th>
          <th>Balance</th>
          <th style='width: 36px;'></th>
        </tr>
       </thead>";



if ($result-> num_rows >0){
    while($row = $result->fetch_assoc() ){  
?>
    <tr>
    <td><?php echo htmlentities($row['id']); ?> </td>
    <td><?php echo('<a style="color:#464646;"href="transfer.php?user_id='.$row['id'].'">'.htmlentities($row['name']).'</a> ');?></td>
    <td><?php echo htmlentities($row['email']); ?> </td>
    <td><?php echo htmlentities($row['balance']); ?> </td>
    <td><button type="submit"  class="btn btn-default" style="font color:#000"><?php echo('<a style="color:#000;" href="transfer.php?id='.$row['id'].'">'."Transfer".'</a> ');?></button></td>
    </tr>

    <?php
    echo "</tr>";
}echo "</table>";
}
?>
    
</div>
        </div>



                        