
<!-- http://localhost/project/index.php -->


<?php $connect = mysqli_connect('localhost', 'root', '', 'project'); ?>

<?php
    $query_fetching_data_from_cart = "SELECT * FROM cart";
    $result_fetching_data_from_cart = mysqli_query($connect, $query_fetching_data_from_cart);
    if(!$result_fetching_data_from_cart){
        echo 'ERROR in fetching data from CART....';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Home</a>
    <div class="container">
    <?php
        while($row = mysqli_fetch_assoc($result_fetching_data_from_cart)){
            $id = $row['product_id'];
            $name = $row['product_name'];
            $image = $row['product_image'];
            $price = $row['product_price'];

            ?>
            <div class="items">
                <h1 class="name"><?php echo $name;?></h1>
                <h1 class="price"><?php echo $price;?></h1>
                <img src=<?php echo $image; ?> alt="product image">
            </div>
            <?php
        }
    ?>
    </div>
</body>
</html>