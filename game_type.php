<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประเภทเกม - GameStore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- 1. Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="brand-logo">🎮 GameStore</a>
            <div class="nav-links">
                <a href="index.php" class="nav-btn">หน้าหลัก</a>
                <a href="game_type.php" class="nav-btn primary">ประเภทเกม</a>
                <a href="manage_game.php" class="nav-btn">จัดการข้อมูลเกม</a>
            </div>
        </div>
    </nav>

    <!-- 2. Content Container -->
    <main class="container">
        <?php
            include 'action/connect.php';
            $sql = "SELECT * FROM game_types";
            $result = mysqli_query($con, $sql);
        ?>

        <div class="page-header">
            <h2>รายการประเภทเกม</h2>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>รหัสประเภท</th>
                        <th>ชื่อประเภทเกม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $type): ?>
                    <tr>
                        <td><?= htmlspecialchars($type["type_id"]) ?></td>
                        <td><?= htmlspecialchars($type["type_name"]) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- 3. Footer -->
    <footer class="footer">
        &copy; <?= date('Y') ?> Game Store System. All rights reserved.
    </footer>
</body>
</html>