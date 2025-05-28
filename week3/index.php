<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Conditional Statements</title>
</head>
<body>
    <?php
    // -------------- Challenge-1 ----------------------------------------------

    echo '<h2>Quiz Zoo Management System</h2> ';
    //   $hour=date("G");
      $hour=rand(1,23);
      $breakfast=array("Bananas","Apples","Oats");
      $lunch=array("Fish","Chicken","Vegetables");
      $dinner=array("Steak","Carrots","Broccoli");
      
      echo '<h3>Current Time is: '.$hour.' </h3>';
      if($hour>5 && $hour<9){
        echo '<ul>
        <h3>Breakfast: </h3>
        <li>'.$breakfast[0]. '</li>
        <li>'.$breakfast[1]. '</li> 
        <li>' .$breakfast[2]. '</li>
        </ul>';
      }
      else if($hour>12 && $hour<14){
          echo '<ul>
        <h3>Breakfast: </h3>
        <li>'.$lunch[0]. '</li>
        <li>'.$lunch[1]. '</li> 
        <li>' .$lunch[2]. '</li>
        </ul>';
      }
      else if($hour>19 && $hour<21){
       echo '<ul>
        <h3>Breakfast: </h3>
        <li>'.$dinner[0]. '</li>
        <li>'.$dinner[1]. '</li> 
        <li>' .$dinner[2]. '</li>
        </ul>';
      }
      else{
        echo 'The animals are not being fed.';
      }
      
      echo '<br>';
   // -------------- Challenge-2 ----------------------------------------------
     echo '<h2>The magic number Game </h2>';

      $number=rand(1,100);

      echo '<h3>The Number is: '.$number.' </h3>';

      if($number%3==0 && $number%5==0){
        echo 'The magic number is "FizzBuzz"';
      }
      else if($number%3==0){
        echo 'The Magic number is "Fizz"';
      }
      else if($number%5==0){
        echo 'The magic number is "Buzz"';
      }
      else{
        echo 'The magic number is the number itself';
      }
      ?>
</body>
</html>