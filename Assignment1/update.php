
<?php
 require('connect.php');
 if($_SERVER['REQUEST_METHOD']== 'GET'){
    $id=$_GET['id'];
    $query="SELECT * FROM foodcentres WHERE FoodCentreID =".$id;
    $result=mysqli_query($connect,$query);
    $foodcentres=$result -> fetch_assoc();
 }
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST['id'];
    $centreName=$_POST['centreName'];
    $centreLocation=$_POST['centreLocation'];
    $centreDescription=$_POST['centreDescription'];

    $query = "UPDATE foodcentres SET 
                `Name` = '$centreName', 
                `Location` = '$centreLocation', 
                `Description` = '$centreDescription' 
              WHERE 
                FoodCentreID = '$id'";

    $result=mysqli_query($connect,$query);
    if($result){
        header('Location: index.php');
    }
    
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Food Centre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="display-3 bg-dark-subtle text-center"> Update a school </h1>
    <a href="index.php" role="button" class="btn btn-secondary bg-primary-subtle text-black p-2 ms-2 mt-2 mb-4 fs-5">Back to Food Centres</a>
    <form action="update.php" method="POST">
       <input class="form-control form-control-lg mb-4 mt-4"  type="text" name="centreName" placeholder="Centre Name" value="<?php echo $foodcentres['Name'];?>">
       <input class="form-control form-control-lg mb-4 mt-4"  type="hidden" name="id" value="<?php echo $id; ?>">
       <input class="form-control form-control-lg mb-4 mt-4"  type="text" name="centreLocation" placeholder="Centre Location" value="<?php echo $foodcentres['Location'];?>">
       <input class="form-control form-control-lg mb-4 mt-4"  type="text" name="centreDescription" placeholder="Centre Description" value="<?php echo $foodcentres['Description'];?>">
       <input  class="btn btn-secondary bg-primary-subtle text-black p-2 ms-2 mt-2 mb-4 fs-5"  type="submit" value="Update" name="updateFoodCentre">
    </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>