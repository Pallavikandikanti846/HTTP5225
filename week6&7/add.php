
<?php
  if(isset($_POST['addSchool'])){
    //  print_r($_POST);
    $boardName=$_POST['boardName'];
    $schoolName=$_POST['schoolName'];
    $email=$_POST['email'];

    require('connect.php');
    $query="INSERT INTO schools(`Board Name`,`School Name`,`Email`)
    VALUES('$boardName','$schoolName','$email')";

    $school=mysqli_query($connect, $query);

    print_r($school);

    if($school){
        header('Location: index.php');
        exit;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add School</title>
</head>
<body>
    <h1> Add a new school </h1>
    <form action="add.php" method="POST">
       <input type="text" name="boardName" placeholder="Board Name">
       <input type="text" name="schoolName" placeholder="School Name">
       <input type="text" name="email" placeholder="Email">
       <input type="submit" value="Submit" name="addSchool">
    </form>
</body>
</html>