
<?php
 require('connect.php');
 if($_SERVER['REQUEST_METHOD']== 'GET'){
    $id=$_GET['id'];
    $query="SELECT * FROM foodcentres WHERE FoodCentreID =".$id;
    $resultCentres=mysqli_query($connect,$query);
    $foodcentres=$resultCentres -> fetch_assoc();

    $items = "SELECT * FROM fooditems WHERE FoodCentreID = $id";
    $result = mysqli_query($connect, $items);

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu For <?php echo $foodcentres['Name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <a href="index.php" role="button" class="btn btn-secondary bg-primary-subtle text-black p-2 ms-2 mt-2 mb-4 fs-5">Back to Food Centres</a>
    <div>
        <h1 class="fs-2 fw-bold"> <?php echo $foodcentres['Name']; ?></h1>
        <p class="fs-3"><?php echo $foodcentres['Location']; ?></p>
    </div>
    <?php
      if(mysqli_num_rows($result) > 0){
       echo '<div class="ms-4">';
             while ($item = mysqli_fetch_assoc($result)){
                echo '<div>
                    <p class="fs-2">' . $item['Name'] . ' - '  . $item['Description'] . '</p>
                    <img src="./assets/' . $item['Images'] . '" alt="' . $item['Name'] . '" width="400">
                    <p class="fs-1">Price: $'.  $item['Price'] . '</p>';

                    $itemId = $item['FoodItemID'];
                    $reviews = "SELECT r.RatingValue, r.ReviewDate, r.ReviewText, u.Username FROM reviews r JOIN users u ON r.UserID=u.UserID WHERE r.FoodCentreID = $itemId ORDER BY r.ReviewDate DESC";
                    $resultReviews = mysqli_query($connect, $reviews);

                    echo '<div class="bg-info-subtle p-5">';

                    echo '<h2 class="fs-3 fw-semibold">Review</h2>';

                    if (mysqli_num_rows($resultReviews) > 0) {
                        echo '<div>';
                        while ($review = mysqli_fetch_assoc($resultReviews)) {
                            echo '<div class="fs-2">
                                <p> Name : ' . $review['Username'] . '</p> 
                                <p> Rated : ' . $review['RatingValue'] . '</p>
                                <p>' . $review['ReviewText'] . '</p>
                                <p> Posted on : ' . $review['ReviewDate'] . '</p>
                            </div>';
                        }
                        echo '</div>';
                    } else {
                        echo '<p>No reviews found for this centre.</p>';
                    }


                                echo '</div>';
                            }
                        echo '</div>';
                    }
                    else {
                        echo '<p>No food items found for this centre.</p>';
                    }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>