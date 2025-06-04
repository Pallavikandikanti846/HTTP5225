<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and MySQL</title>
    <style>
        .colorDiv{
            height:50px;
            width:100%;
        }
    </style>
</head>
<body>
    <?php
    $connect=mysqli_connect('localhost','root','','colors');
    if(!$connect){
        die("Connection Failed : ". mysqli_connect_error());
    }
    $query='SELECT * FROM colors';
    $colors=mysqli_query($connect,$query);
    if($colors){
        foreach($colors as $color){
            echo '<div class="colorDiv" style="background:' . $color['Hex'] . '">' . $color['Name'] . '</div>';
        }
    }
    
    ?>

    
</body>
</html>