<?php
    include "../classes/user.php";
    $user = new User();
    if(isset($_GET['action'])){
        if($_GET['action'] == "logout"){
            $user->logout();
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
    ?>
    <div class = "container">
        <div class = "row-title">
            <h1 id = "title">Chỉnh sửa thông tin người dùng</h1>
        </div>
        <div class = "edit-user-info">
            <div class = "form-edit">
                <form action = "" method="post">
                    <table>
                        <tr><td>Ảnh đại diện: </td>
                        <td><input type="file" name = "avatar"></td></tr>
                        <tr><td>Tên hiển thị: </td>
                        <td><input type = "text" name = "name" id = "name"></td></tr>
                        <tr><td>Giới tính:</td>
                        <td><select name = "sex-picker" id = "sex-picker">
                            <option value = 0>Nam</option>
                            <option value = 1>Nữ</option>
                            <option value = 2>Khác</option>
                        </select></select></td></tr>
                        <tr><td>Số điện thoại: </td>
                        <td><input type = "text" name = "phone" id = "phone"></td></tr>
                        <tr><td>Địa chỉ: </td>
                        <td><input type = "text" name = "address" id = "user-address"></td></tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <?php
        include "../include/foooter-user-playlist.php";
    ?>
</body>
</html>