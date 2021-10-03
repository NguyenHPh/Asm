<?php
    
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/user-account.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
  
  <title></title>
</head>

<body>
   <div class = "container"> 
        <div class = "user-info">
            <div class = "user-info-detail">
                <div class = "user-image">
                </div>
                <div class = "info">
                    <h1 id = "user-name">User Name</h2>
                    <p id = "user-id">User id: 01</p>
                    <p>Giới tính: </p>
                </div>
            </div>
        </div>
        <div class = "side-bar">
            <ul>
                <li><a href=""><i class="fas fa-home"></i></a></li>
                <li><a href="">Play List</a></li>
                <li><a href="">Thông tin</a></li>
                <li><a href="">Bạn bè</a></li>
            </ul>
        </div>
    </div>
    <div class = "play-list">
        <h1 style="color: cornflowerblue; margin-left: 100px;">Play List|Album</h1>
        <div class = "list-music">
            <a href=""><div class = "image-playlist">
              
            </div></a>
            <div class = "playlist-content">
                <p id = "playlist-name"><a href="">PlayList Name</a></p>
                <p id = "username">User name: </p>
                <p id = "playlist-information">Playlist Information: </p>
            </div>
        </div>
    </div>
    <?php
        include "../include/foooter-user-playlist.php";
    ?>
</body>
</html>
