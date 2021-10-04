<?php
   
    $userInf = $user->showInfoUser($_SESSION['login-user']);
    while($rowInf = mysqli_fetch_assoc($userInf)){
        $image = $rowInf['image'];
        if($rowInf['sex'] == 0){
            $sex = "Nam";
        }else if($rowInf['sex'] == 1){
            $sex = "Nữ";
        }else{
            $sex = "Khác";
        }
?>
<div class = "container"> 
        <div class = "user-info">
            <div class = "user-info-detail">
                <div class = "user-image" style="background: url('<?php echo '../image/'.$image?>');background-size: cover; background-repeat: no-repeat">
                </div>
                <div class = "info">
                    <h1 id = "user-name"><?php echo $rowInf['name']?></h2>
                    <p id = "user-id">Id người dùng: <?php echo $rowInf['user_id']?></p>
                    <p>Giới tính: <?php echo $sex?> </p>
                </div>
            </div>
        </div>
        <div class = "side-bar">
            <ul>
                <li><a href="../front-end/index.php"><i class="fas fa-home"></i></a></li>
                <li><a href="../front-end/user-playlist.php">Play List</a></li>
                <li><a href="../front-end/edit-user-info.php">Thông tin</a></li>
                <li><a href="">Bạn bè</a></li>
                <li><a href = "?action=logout">Đăng Xuất</a></li>
            </ul>
        </div>
    </div>
<?php
    }
?>