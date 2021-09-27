<?php
    include "../Lib/session.php";
    include "../classes/product.php";
    $session = new Session();
    $product = new Product();
    if(isset($_GET["delete"])){
        array_splice($_SESSION['cart'], $_GET['delete'], 1);
        header("Location: cart.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printd T-Shirt - RedStore</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
       <?php
            include "../include/header.php";
       ?>

    <!-- -----------------cart item details------------------- -->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php
            if(isset($_SESSION["cart"]) && is_array($_SESSION["cart"])){
                for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
                    $result = $product->showOnly($_SESSION['cart'][$i][0]);
                    while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?php echo "../image/".$row['image']?>">
                        <div>
                            <p><?php $row['product_name']?></p>
                            <small>Price: $<?php echo $row['product_price']?></small>
                            <br>
                            <a href="?delete=<?php echo $i?>" onclick="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="<?php echo $_SESSION['cart'][$i][1]?>"></td>
                <td><?php echo $row['product_price'] * $_SESSION['cart'][$i][1]?></td>
            </tr>
            <?php
                    }
                }
                }
            ?>
            </table>
        </div>
    </div>
    <!-- ------------footer----------- -->

    <?php
        include "../include/footer.php";
    ?>
</body>

</html>