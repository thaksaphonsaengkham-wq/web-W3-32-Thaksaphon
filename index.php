<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- 1. Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="brand-logo">GameStore</a>
            <div class="nav-links,">
                <a href="index.php" class="nav-btn">หน้าหลัก</a>
                <a href="game_type.php" class="nav-btn">ประเภทเกม</a>
                <a href="manage_game.php" class="nav-btn primary">จัดการข้อมูลเกม</a>
            </div>
        </div>
    </nav>

    <!-- Content Container -->
    <main class="container">
    
    <?php

//แสดง error

    // Report all PHP errors
    error_reporting(E_ALL);

    // Force errors to be displayed on the screen
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

        include 'action/connect.php';

        // if(!$con){
        //     echo 'Can Not Connect DB.';
        // }else{
        //     echo 'Connect Success.';
        // }
        //       เลือก   ทั้งหมด จาก ตาราง games
        $sql = "SELECT * FROM games";
        //                   ทำงานที่ไหน, ทำอะไร
        $result = mysqli_query($con ,$sql);
        // ทดสอบ
        // var_dump($sql);
        ?>
        <div class="button-container">
            <a href="game_type.php">game_type</a>
        </div>

<table>
    <table border=1>
        <thead>
            <th>รหัสเกม</th>
            <th>ชื่อเกม</th>
            <th>ราคา</th>
            <th>ภาพปก</th>
            <th>ประเภท</th>
        </thead>

        <?php
            foreach($result as $game){
                //var_dump($game);
                // $game["game_name"]
                ?>
                <tr>
                    <td><?= $game["game_id"] ?> </td>
                    <td><?= $game["game_name"] ?></td>
                    <td><?= $game["game_price"] ?></td>
                    <td>
                        <img src="<?= $game["game_cover"] ?>"
                        style="width:200px"
                        >
                    </td>
                    <td><?= $game["type_id"] ?></td>
                </tr>
                <?php
            }
        ?>

</table>
   
</body>

     <!-- 3. Footer -->
    <footer class="footer">
        &copy; <?= date('Y') ?> Game Store System. All rights reserved.
    </footer>
</html>