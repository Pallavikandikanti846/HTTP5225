
<?php
 require('connect.php');
 $id=$_GET['id'];
  $query = "DELETE FROM schools 
              WHERE 
                id = '$id'";
$result=mysqli_query($connect,$query);
    if($result){
        header('Location: index.php');
    }
 
