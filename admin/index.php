<?php
    include '../classes/admin-login.php';
	require_once '../Lib/session.php';
	Session::checkLogin();
    $login = new adminLogin();
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($login->loginAdmin($username, $password)){
            header("Location: manage-product.php");
        }else{
?>
        <script>
            alert('Sai tên đăng nhập hoặc mật khẩu');
        </script>
<?php
        }
    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style>
body {
	padding: 50px;
}
* {
	margin: 0;
	padding: 0;
}
.form-tt {
	width: 400px;
	border-radius: 10px;
	overflow: hidden;
	padding: 55px 55px 37px;
	background: #9152f8;
    background: -webkit-linear-gradient(top,#7579ff,#b224ef);
    background: -o-linear-gradient(top,#7579ff,#b224ef);
    background: -moz-linear-gradient(top,#7579ff,#b224ef);
    background: linear-gradient(top,#7579ff,#b224ef);
    text-align: center;
	margin-left: 450px;
}
.form-tt h2 {
    font-size: 30px;
    color: #fff;
    line-height: 1.2;
     text-align: center;
     text-transform: uppercase;
     display: block;
     margin-bottom: 30px;
}

.form-tt input[type=text], .form-tt input[type=password] {
    font-family: Poppins-Regular;
    font-size: 16px;
	color: #fff;
	line-height: 1.2;
	display: block;
	width: calc(100% - 10px);
	height: 45px;
	background: 0 0;
	padding: 10px 0;
	border-bottom: 2px solid rgba(255,255,255,.24)!important;
	border: 0;
	outline: 0;
}

.form-tt input[type=password] {
	margin-bottom: 20px;
}
.form-tt input::placeholder {
	color: #fff;
}
		
.form-tt input[type=submit] {
	font-size: 16px;
	color: #555;
	line-height: 1.2;
	padding: 0 20px;
	min-width: 120px;
	height: 50px;
	border-radius: 25px;
	background: #fff;
	position: relative;
	z-index: 1;
	border: 0;
	outline: 0;
	display: block;
	margin: 30px auto;
	cursor: pointer;
}
#checkbox {
	display: inline-block;
	margin-right: 10px;
}

.psw-text {
	color: #fff;
}
</style>
</head>
	
<body>


<div class="form-tt">
		<h2>Đăng nhập</h2>
	<form action="" method="post" name="dang-ky">
		<input type="text" name="username" placeholder="Nhập tên đăng ký" required/>
		<input type="password" name="password" placeholder="Nhập mật khẩu" required/>
		<input type="submit" name="submit" value="Đăng nhập" />
	</form>
	
</div>
</body>
</html>