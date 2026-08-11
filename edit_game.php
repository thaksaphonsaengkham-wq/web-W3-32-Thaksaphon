<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลเกม - GameStore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- 1. Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="brand-logo">🎮 GameStore</a>
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
            $id = isset($_GET['id']) ? mysqli_real_escape_string($con, $_GET['id']) : '';

            // ดึงข้อมูลเกม
            $sql_game = "SELECT * FROM games WHERE game_id = '$id'";
            $res_game = mysqli_query($con, $sql_game);
            $game = mysqli_fetch_assoc($res_game);

            // ดึงประเภทเกม
            $sql_types = "SELECT * FROM game_types";
            $res_types = mysqli_query($con, $sql_types);
        ?>

        <div class="form-card">
            <h2>✏️ แก้ไขข้อมูลเกม</h2> <br>
            <form action="action/update_game.php" method="post">
                <div class="form-group">
                    <label for="game_id">รหัสเกม (อ่านอย่างเดียว)</label>
                    <input type="text" id="game_id" name="game_id" class="form-control" value="<?= htmlspecialchars($game['game_id'] ?? '') ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="game_name">ชื่อเกม</label>
                    <input type="text" id="game_name" name="game_name" class="form-control" value="<?= htmlspecialchars($game['game_name'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label for="game_price">ราคา (บาท)</label>
                    <input type="number" step="0.01" id="game_price" name="game_price" class="form-control" value="<?= htmlspecialchars($game['game_price'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label for="game_cover">ลิงก์ภาพปก (URL)</label>
                    <input type="text" id="game_cover" name="game_cover" class="form-control" value="<?= htmlspecialchars($game['game_cover'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label for="type_id">ประเภทเกม</label>
                    <select name="type_id" id="type_id" class="form-control" required>
                        <?php foreach($res_types as $type): ?>
                            <option value="<?= $type["type_id"] ?>" 
                                <?= ($type["type_id"] == ($game["type_id"] ?? '')) ? "selected" : "" ?>>
                                <?= htmlspecialchars($type["type_name"]) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">อัปเดตข้อมูล</button>
                    <a href="manage_game.php" class="btn btn-secondary">ยกเลิก</a>
                </div>
            </form>
        </div>
    </main>

    <!-- 3. Footer -->
    <footer class="footer">
        &copy; <?= date('Y') ?> Game Store System. All rights reserved.
    </footer>
</body>
</html>