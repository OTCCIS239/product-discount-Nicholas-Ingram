<!doctype html>
<html>
    <form action="display_discount.php" method="post">
        <div id="data">
            <label>Product Description:</label>
            <input type="text" name="product_description"><br>
            <label>List Price:</label>
            <input type="text" name="list_price"><br>
            <label>Discount Percent:</label>
            <input type="text" name="discount_percent"><sapn>%</sapn><br>
        </div>
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate Discount"><br>
        </div>
    </form>
</html>