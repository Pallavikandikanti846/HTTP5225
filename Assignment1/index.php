<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Humber Eats</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="display-4 bg-dark-subtle text-center">Humber Food Centres</h1>
    <a href="add.php" role="button" class="btn btn-secondary bg-primary-subtle text-black p-2 ms-2 mt-2 fs-5">Add New Food Centre</a>
    <?php
    include('connect.php');    

    $query = 'SELECT * FROM foodcentres';
    $foodcentres = mysqli_query($connect, $query);

    foreach($foodcentres as $foodcentre){
    echo '<div class="p-5 fs-4">';
    echo '<p>' . $foodcentre['Name'] . '</p>';
    echo '<p>' . $foodcentre['Location'] . '</p>';
    echo '<p>' . $foodcentre['Description'] . '</p>';
    echo '<div class="d-flex gap-2">';
     echo '<div> <form action="menu.php" method="GET">
      <input type="hidden" name="id" value="'.$foodcentre["FoodCentreID"].'">
      <input type="submit" name="viewMenu" value="View Menu">
    </form> </div>';
    echo '<div> <form action="update.php" method="GET">
      <input type="hidden" name="id" value="'.$foodcentre["FoodCentreID"].'">
      <input type="submit" name="edit" value="Edit">
    </form> </div>';
    echo '<div> <form action="delete.php" method="GET">
      <input type="hidden" name="id" value="'.$foodcentre["FoodCentreID"].'">
      <input type="submit" name="delete" value="Delete">
    </form> </div>'; 
    echo '</div>';
    echo '</div>';
  }
    ?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>