<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข้อมูลเกม - GameStore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- 1. Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="brand-logo">GameStore</a>
            <div class="nav-links">
                <a href="index.php" class="nav-btn">หน้าหลัก</a>
                <a href="game_type.php" class="nav-btn">ประเภทเกม</a>
                <a href="manage_game.php" class="nav-btn primary">จัดการข้อมูลเกม</a>
            </div>
        </div>
    </nav>

    <!-- 2. Content Container -->
    <main class="container">
        <?php
            include 'action/connect.php';
            $sql = "SELECT games.*, game_types.type_name 
                    FROM games 
                    LEFT JOIN game_types ON games.type_id = game_types.type_id";
            $result = mysqli_query($con, $sql);
        ?>

        <div class="page-header">
            <h2>จัดการข้อมูลเกม</h2>
            <!-- ปุ่มลิงก์ไปหน้าเพิ่มข้อมูลเกม add_game.php อยู่ตรงนี้ -->
            <a href="add_game.php" class="btn btn-primary">เพิ่มข้อมูลเกมใหม่</a>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>รหัสเกม</th>
                        <th>ภาพปก</th>
                        <th>ชื่อเกม</th>
                        <th>ราคา</th>
                        <th>ประเภท</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $game): ?>
                    <tr>
                        <td><?= htmlspecialchars($game["game_id"]) ?></td>
                        <td>
                            <img src="<?= htmlspecialchars($game["game_cover"]) ?>" alt="Cover" class="game-img">
                        </td>
                        <td><?= htmlspecialchars($game["game_name"]) ?></td>
                        <td><?= number_format($game["game_price"], 2) ?> บาท</td>
                        <td><?= htmlspecialchars($game["type_name"] ?? $game["type_id"]) ?></td>
                        <td>
                            <a href="edit_game.php?id=<?= $game['game_id'] ?>" class="btn btn-secondary">แก้ไข</a>
                            <a href="action/delete_game.php?id=<?= $game['game_id'] ?>" 
                               class="btn btn-danger" 
                               onclick="return confirm('ยืนยันการลบเกม <?= htmlspecialchars($game['game_name']) ?> ?');">
                               ลบ
                            </a>
                        </td>
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