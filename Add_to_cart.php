<!-- Add_to_cart.php -->

<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    // Get food item details
    $food_item = $_POST["food_item"];
    $quantity = $_POST["quantity"];

    // Store the food item in the session
    $_SESSION["cart"][$food_item] = $quantity;

    // Display a success message
    $message = "Food item added to cart!";
}

// Check if the form is submitted to place the order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["place_order"])) {
    // Display order details
    $order_details = $_SESSION["cart"];
    // You can now process the order, save it to a database, etc.

    // Clear the cart after placing the order
    unset($_SESSION["cart"]);

    // Display a success message
    $message = "Order placed successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>

    <style>
        body { 
            background-color: rgb(240, 246, 200);
            overflow-x: hidden;
            background-image: url('./Image/resback.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container1 {
            max-width: 400px;
            background-color: #fff;
            padding: 80px;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.2);
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1.2rem;
        }

        label {
            display: block;
            font-size: 1.2rem;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button {
            background-color: rgb(222, 238, 179);
            border-radius: 15px;
            font-size: 1.0rem;
            padding: 1.0rem 1.5rem;
            display: block;
            margin: auto;
        }

        .button:hover {
            background-color: #45a049;
        }

        h2 {
            margin-top: 20px;
            color: #333;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 8px;
        }
    </style>
    
</head>
<body>
    <?php
    // Display messages
    if (isset($message)) {
        echo "<p>$message</p>";
    }
    ?>

    <!-- Form to add food items to the cart -->
        <div class="container1 mt-3">
        <h1>Add to Cart</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="food_item">Food Item:</label>
        <input type="text" name="food_item" required>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>

        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <?php
    // Display the current cart contents
    if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
        echo "<h2>Cart Contents:</h2>";
        echo "<ul>";
        foreach ($_SESSION["cart"] as $item => $qty) {
            echo "<li>$item: $qty</li>";
        }
        echo "</ul>";

        // Form to place the order
        echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
        echo '<button type="submit" name="place_order">Place Order</button>';
        echo '</form>';
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>

</body>
</html>