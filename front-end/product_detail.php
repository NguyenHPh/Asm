<?php
    include "../classes/product.php";
    include "../Lib/session.php";
    $session = new Session();
    $product = new product();
    if(isset($_GET['id']) && !empty($_GET["id"])){
        $result = $product->showOnly($_GET["id"]);
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $noExist = 4;
            $check = $session->checkExistInCart("cart",$_POST['id']);
            $product_id = $_POST["id"];
            $quantity = $_POST['quantity'];
            if($check ==  $noExist){
                $cart = [$product_id, $quantity];
                $_SESSION["cart"][] = $cart;
            }else{
                $_SESSION["cart"][$check][1] += $quantity;
            }
            header("Location: cart.php");
        }
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

    <!-- ---------- single Products detail ----------- -->
    <form action = "" method = "POST">
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="small-container single-product">
            <div class="row">
                <div class="col-2">
                    <img src="<?php echo "../image/".$row['image']?>" width="100%" id="productImg">
                </div>
                <div class="col-2">
                    <p>Product detail</p>
                    <h1><?php echo $row['product_name'] ?></h1>
                    <h4>$<?php echo $row['product_price']?>0</h4>
                        <input type="number" value="1" name = "quantity">
                        <input type = "hidden" value = "<?php echo $row['id']?>" name = "id">
                        <button type="submit" class="btn">Add To Card</button>
                        <h3>Product Detail
                            <i class="fa fa-indent"></i>
                        </h3>
                        <br>
                        <p><?php echo $row['product_content']?></p>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </form>
</div>
    <!-- ------------footer----------- -->
            <?php
                include "../include/footer.php";
            ?>
      
</body>

</html>