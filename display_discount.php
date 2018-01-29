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
<html>

<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?= $product_description ?></span>
        <br>

        <label>List Price:</label>
        <span><?= $list_price_f ?></span>
        <br>

        <label>Standard Discount:</label>
        <span><?= $discount_f ?></span>
        <br>

        <label>Discount Amount:</label>
        <span><?= $discount_percent_f ?></span>
        <br>

        <label>Discount Price:</label>
        <span><?= $discount_price_f ?></span>
        <br>
    </main>
</body>
</html>
