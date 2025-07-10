
<?php
 require('connect.php');
 $id=$_GET['id'];
  $query = "DELETE FROM foodcentres 
              WHERE 
                FoodCentreID = '$id'";
$result=mysqli_query($connect,$query);
    if($result){
        header('Location: index.php');
    }
 
