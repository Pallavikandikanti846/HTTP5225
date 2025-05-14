<!doctype html>
<html>
  <head>
    
    <title>PHP and Creating Output</title>
    
  </head>
  <body>
  
    <?php
    echo '<h1>Hello World!</h1>';

    echo '<h2>Welcome to PHP</h2>';

    echo '<hr>';

    echo '<h2>Variables</h2>';

    $fname="Pallavi";
    $lname="Kandikanti";

    echo 'Hello' .$fname. ' ' .$lname;

    echo '<hr>';

    echo '<h2>Arrays</h2>';

    $fruits=array("Apple","Banana","Mango");



    $fruits[3]="Strawberry";

    echo '<ul>
    <li>'.$fruits[0].'</li>
    <li>'.$fruits[1].'</li>
    <li>'.$fruits[2].'</li>
    <li>'.$fruits[3].'</li>
    </ul>';

    $fruits['name']="Guava";

    echo '<li>' . $fruits["name"] . '</li>';
    
  ?>
  </body>
</html>