
<?php
  if(isset($_POST['addFoodCentre'])){
    //  print_r($_POST);
    $centreName=$_POST['centreName'];
    $centreLocation=$_POST['centreLocation'];
    $centreDescription=$_POST['centreDescription'];

    require('connect.php');
    $query="INSERT INTO foodcentres(`Name`,`Location`,`Description`)
    VALUES('$centreName','$centreLocation','$centreDescription')";

    $foodcentres=mysqli_query($connect, $query);

    print_r($foodcentres);

    if($foodcentres){
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
    <title>Add Food Centre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="display-2 bg-dark-subtle text-center"> Add a New Food Centre </h1>
    <a href="index.php" role="button" class="btn btn-secondary bg-primary-subtle text-black p-2 ms-2 mt-2 mb-4 fs-5">Back to Food Centres</a>
    <form action="add.php" method="POST">
       <input class="form-control form-control-lg mb-4 mt-4" type="text" name="centreName" placeholder="Centre Name">
       <input class="form-control form-control-lg  mb-4" type="text" name="centreLocation" placeholder="Centre Location">
       <input class="form-control form-control-lg  mb-4" type="text" name="centreDescription" placeholder="Centre Description">
       <input role="button" class="btn btn-secondary bg-primary-subtle text-black p-2 ms-2 mt-2 mb-4 fs-5" type="submit" value="Submit" name="addFoodCentre">
    </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>