<?php
    include "../classes/product.php";
    include "../classes/category.php";
    $product = new product();
    $category = new category();
    $result1 = $category->showToWeb();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!empty($_POST['search'])){
            $result = $product->search($_POST['search']);
        }else{
            $result = $product->showToWeb();
        }
    }else{
        $result = $product->showToWeb();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - RedStore</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #result{
            margin-top: -30px;
        }
    </style>
</head>

    <div class="small-container">
        <?php
            include "../include/header.php";
        ?>
        <div class="row row-2">
            <h2>Products</h2>
            <form action = "" method="Post">
                <table>
                   <tr>
                       <td><input type="text" name = "search" placeholder="Nhập sản phẩm cần tìm" onkeyup = "liveSearch(this.value);"></td>
                       <td><button style = "height: 28px; width: 70px;" type="submit" id = "search-product">Tìm Kiếm</button></td>
                   </tr>
                   <tr>
                       <td><span id='result' style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background-color: white; width:300px; position: fixed;"></span></td>
                       <td></td>
                    </tr>
                </table>
            </form>
         <!--   <form action = "" method="Post">
                <select name = "id">
                    <?php
                        if(empty($_POST['id']) || !isset($_POST['id'])){
                    ?>
                            <option selected value="">All product</option>
                    <?php
                        }else{
                    ?>
                            <option value="">All product</option>
                    <?php
                        }
                        while($row1 = mysqli_fetch_assoc($result1)){
                            if($row1['id'] == $_POST['id']){
                    ?>
                            <option selected value = "<?php echo $row1['id']?>"><?php echo $row1['category_name']?></option>
                    <?php
                            }else{
                    ?>
                            <option value = "<?php echo $row1['id']?>"><?php echo $row1['category_name']?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
                <input type="submit" name = "submit" value="Tìm kiếm" style="width:100px;" id = "search-category">
            </form>-->
        </div>

        <div class="row">
            <?php
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <div class="col-4">
                    <a href="product_detail.php?id=<?php echo $row['id'];?>"><img src=<?php echo ("../image/".$row['image']) ?> style="width: 230px; height: 300px;"></a>
                    <h4><?php echo $row['product_name'] ?></h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p><?php echo $row['product_price'];?>đ<p>
                </div>
            <?php
                }
            ?>
            </div>
        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div>
    </div>
    <!-- ------------footer----------- -->
        <?php
            include "../include/footer.php";
        ?>
        <!-- ------------------- js for live search-------------- -->
        <script>
        function object(){
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
                return xmlhttp;
            }
        }
            http = object();
            function liveSearch(data){
                if(data != ""){
                    http.onreadystatechange = process;
                    http.open('GET', '../classes/get.php?data=' + data, true);
                    http.send();
                }else{
                    document.getElementById("result").innerHTML = "";
                }
            }
            
            function process(){
                if(http.readyState==4 && http.status==200){
                    var result = http.responseText;
                    document.getElementById("result").innerHTML = result;
                }
            }
        </script>
</body>

</html>