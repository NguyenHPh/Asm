<?php
    include "../classes/user.php";
    require_once "../Lib/session.php";
    $user = new User();
    $check = Session::checkLoginForUser();
    if($check == false){
        header("Location: account.php");
     }
    if(isset($_GET['action'])){
        if($_GET['action'] == "logout"){
            $user->logout();
        }
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit-edit'])){
            $files = $_FILES['img'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $sex = $_POST['sex-picker'];

            $result = $user->editUserInfo($files, $name, $sex, $phone, $address);
            if($result){
?>
                <script>
                    alert("Cập nhật thành công");
                </script>
<?php
            }
        }
    }
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/user-account.css">
  <link rel="stylesheet" href="../css/edit-user-info.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
  <link rel = "stylesheet" href="../css/header-and-footer.css">
  
  <title></title>
</head>

<body>
    <?php
        include "../include/header-user-playlist.php";
        $result = $user->showInfoUser($_SESSION['login-user']);
        while($row = mysqli_fetch_assoc($result)){
            $user_sex = $row['sex'];
    ?>
    <div class = "container">
        <div class = "row-title">
            <h1 id = "title">Chỉnh sửa thông tin người dùng</h1>
        </div>
        <div class = "edit-user-info">
            <div class = "form-edit">
                <form action = "" method="post" enctype="multipart/form-data"> <?php // Muốn post được file phải có enctype = "multipart/form-data" ?>
                    <table>
                        <tr><td>Ảnh đại diện: </td>
                        <td>
                            <input type = "file" name="img">                        
                        </td></tr>
                        
                        <tr><td>Tên đăng nhập: </td>
                        <td><input type = "text" name = "user-account-name" value="<?php echo $row['username']?>" disabled/></td></tr>
                        <tr><td>Tên hiển thị: </td>
                        <td><input type = "text" name = "name" id = "name" value="<?php echo $row['name']?>"/></td></tr>
                        <tr><td>Giới tính:</td>
                        <td><select name = "sex-picker" id = "sex-picker">
                            <?php
                                if($user_sex == 0){
                            ?>
                            <option value = 0 selected>Nam</option>
                            <?php 
                                }else{
                            ?>
                            <option value = 0>Nam</option>
                            <?php
                                }
                                if($user_sex == 1){
                            ?>
                            <option value = 1 selected>Nữ</option>
                            <?php 
                                }else{
                            ?>
                            <option value = 1>Nữ</option>
                            <?php
                                }
                                if($user_sex == 2){
                            ?>
                            <option value = 2 selected>Khác</option>
                            <?php 
                                }else{
                            ?>
                            <option value = 2>Khác</option>
                            <?php
                                }
                            ?>
                        </select></select></td></tr>
                        <tr><td>Số điện thoại: </td>
                        <td><input type = "text" name = "phone" id = "phone" value="<?php echo $row['phone']?>"/></td></tr>
                        <tr><td>Địa chỉ: </td>
                        <td><input type = "text" name = "address" id = "user-address" value="<?php echo $row['address']?>"/></td></tr>
                        <tr><td colspan="2" style="padding-top: 20px;"><input type = "submit" name = "submit-edit" id = "submit-edit" value = "Cập Nhật" /></td></tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    </div>
    <?php
        include "../include/foooter-user-playlist.php";
    ?>
</body>
</html>
