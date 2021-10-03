<?php
    include "../classes/user.php";
    require_once "../Lib/session.php";
    $user = new User();
    $check = Session::checkLoginForUser();
    if($check == true){
        header("Location: user-playlist.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        var_dump($username);
        
        if(isset($_POST['login-form'])){        
            $user->login($username, $password);
        }else if(isset($_POST['register-form'])){
            $email = $_POST['email'];
            $result = $user->addNewUser($username, $password, $email);
            if($result){
?>
                <script>
                    alert("Đăng kí thành công");
                </script>
<?php
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">

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
    <!-- ------------Account-page------------------- -->
    <?php
            include "../include/header.php";
    ?>
    <div class="account-page">
        <div class="container" style="padding: 0px;">
            <div class="row">
                <div class="col-2">
                    <img src="../image/image1.png" width="100%">
                </div>

                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>

                        <form  id="LoginForm" action ="" method="post">
                            <input type="text" placeholder="Username" name = "username" required>
                            <input type="password" placeholder="Password" name = "password" required>
                            <button name = "login-form" type="submit" class="btn">Login</button>
                            <a href="">Forgot password</a>
                        </form>

                        <form  id="RegForm" action="" method="post">
                            <input type="text" placeholder="Username" name = "username" required>
                            <input type="email" placeholder="Email" name = "email" required>
                            <input type="password" placeholder="Password" name = "password" required>
                            <button type="submit" class="btn" name = "register-form">Register</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------footer----------- -->
        <?php
            include "../include/footer.php";
        ?>
        <!-- ------------------- js for toggle menu-------------- -->
        <script>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                }
                else {
                    MenuItems.style.maxHeight = "0px";
                }
            }

        </script>
        <!-- ------------------- js for Account form-------------- -->

        <script>
            var LoginForm = document.getElementById("LoginForm");
            var RegForm = document.getElementById("RegForm");
            var Indicator = document.getElementById("Indicator");

            function register() {
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";

            }
            function login() {
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }


        </script>

</body>

</html>