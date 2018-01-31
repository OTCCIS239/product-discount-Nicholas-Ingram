<?php
/**
 * Created by PhpStorm.
 * User: nickq
 * Date: 1/29/2018
 * Time: 9:19 AM
 */

    //Get the data from the form
    $product_description = $_POST['product_description'];
    $list_price = $_POST['list_price'];
    $discount_percent = $_POST['discount_percent'];

    //Calculate the discount and discounted price
    $discount = $list_price * $discount_percent * .01;
    $discount_price = $list_price - $discount;

    //Apply currency formatting to the dollar and percent amounts
    $list_price_f = "$".number_format($list_price, 2);
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
                        <form action="display_discount.php" method="post">
                            <div id="data">
                                <div class="form-group">
                                    <label for="productdescription">Product Description:</label><br>
                                    <span class="ml-5"><?= $product_description ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="price">List Price:</label><br>
                                    <span class="ml-5"><?= $list_price_f ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="percent">Standard Discount:</label><br>
                                    <span class="ml-5"><?= $discount_f ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="discountpercent">Discount Percent:</label><br>
                                    <span class="ml-5"><?= $discount_percent_f ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="discountprice">Discount Price:</label><br>
                                    <span class="ml-5"><?= $discount_price_f ?></span>
                                </div>
                            </div>
                        </form>
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
