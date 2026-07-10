<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

    include 'action/connect.php';
    $sql = "SELECT * FROM game_types";
    $result = mysqli_query($con ,$sql);

    ?>
    <div class="button-container">
        <a href="index.php">game_name</a>
    </div>

<table>

        <table border=1>
        <thead>
            <th>รหัสประเภท</th>
            <th>ชื่อประเภท</th>
        </thead>

    <?php
        foreach($result as $type){
                //var_dump($game);
                // $game["game_name"]
                ?>
                <tr>
                    <td><?= $type["type_id"] ?> </td>
                    <td><?= $type["type_name"] ?></td>
                </tr>
                <?php
            }
        ?>
</table>
</body>
</html>