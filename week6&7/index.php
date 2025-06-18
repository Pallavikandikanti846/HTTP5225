<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>Toronto Board Schools</h1>
  <p>This is a website to showcase all Toronto school.</p>
  <?php 
    include('connect.php');    

    //This is the table name
    $query = 'SELECT * FROM schools';
    $schools = mysqli_query($connect, $query);
    //echo '<pre>' . print_r($schools) . '</pre>';

    foreach($schools as $school){
    echo $school['School Name'] . ' 
    <form action="update.php" method="GET">
      <input type="hidden" name="id" value="'.$school["id"].'">
      <input type="submit" name="edit" value="Edit">
    </form>
    <form action="delete.php" method="GET">
      <input type="hidden" name="id" value="'.$school["id"].'">
      <input type="submit" name="delete" value="Delete">
    </form>';  
  }
    ?>
</body>
</html>