<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Loops</title>
</head>
<body>
    <?php
     // Function to fetch user data from the JSONPlaceholder API
        function getUsers() {
        $url = "https://jsonplaceholder.typicode.com/users";
        $data = file_get_contents($url);
        return json_decode($data, true);
        }
        // Get the list of users
        $users = getUsers();
        foreach($users as $user){
            echo '<h2>Personal Details of user: '.$user["id"]. '</h2>';
            echo 'id: '.$user["id"];
            echo '<br>';
            echo 'name: '.$user["name"];
            echo '<br>';
            echo 'username: '.$user["username"];
            echo '<br>';
            echo 'email: <a href="mailto: '.$user["email"]. '">' .$user["email"].' </a>';
            echo '<br>';
            echo '<h2> Address: </h2>';
            echo '<br>';
            echo 'street: '.$user["address"]["street"];
            echo '<br>';
            echo 'suite: '.$user["address"]["suite"];
            echo '<br>';
            echo 'city: '.$user["address"]["city"];
            echo '<br>';
            echo 'zipcode: '.$user["address"]["zipcode"];
            echo '<br>';
           

        }
    ?>
</body>
</html>