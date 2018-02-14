<?php
    require_once('./db.php');

    $productId = $_POST['product_id'];
    $couponId = $_POST['coupon_id'];

    // $query = "SELECT * FROM products WHERE id = :product_id";
    // $statement = $conn->prepare($query);
    // $statement->bindValue(':product_id', $productId);
    // $statement->execute();
    // $product = $statement->fetch();
    // $statement->closeCursor();
    
    $product = getOne("SELECT * FROM products WHERE id = :product_id", [
        ':product_id' => $productId
    ], $conn);
    $coupon = getOne("SELECT * FROM coupons WHERE id = :coupon_id", [
        ':coupon_id' => $couponId
    ], $conn);

    // $query = "SELECT * FROM coupons WHERE id = :coupon_id";
    // $statement = $conn->prepare($query);
    // $statement->bindValue(':coupon_id', $couponId);
    // $statement->execute();
    // $coupon = $statement->fetch();
    // $statement->closeCursor();

    $description = $product['description'];
    $price = $product['price'];
    $discount_percent = $coupon['discount_percent'];

    //Calculate the discount and discounted price
    $discount = $price * $discount_percent * .01;
    $discount_price = $price - $discount;

    //Apply currency formatting to the dollar and percent amounts
    $list_price_f = "$".number_format($price, 2);
    $discount_percent_f = $discount_percent."%";
    $discount_f = "$".number_format($discount, 2);
    $discount_price_f = "$".number_format($discount_price, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Discount Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="height:100vh;">
        <div class="row align-items-center" style="height:100%;">
            <div class="col-sm"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Discount Calculator
                    </div>
                    <div class="card-body">
                        <div class="card-header">
                            Discount Calculator
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-6">Description</dt>
                                <dd class="col-6"><?= $description ?></dd>

                                <dt class="col-6">List Price</dt>
                                <dd class="col-6"><?= $price ?></dd>

                                <dt class="col-6">Coupon</dt>
                                <dd class="col-6"><?= $coupon['code']." - ".$coupon['description'] ?></dd>

                                <dt class="col-6">Discount</dt>
                                <dd class="col-6"><?= $discount_f ?></dd>

                                <dt class="col-6">Discount Amount</dt>
                                <dd class="col-6"><?= $discount_price_f ?></dd>

                                <dt class="col-6">Discount Price</dt>
                                <dd class="col-6"><?= $discount_price_f ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
