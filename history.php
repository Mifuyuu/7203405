<?php
require 'config.php';
require 'db.php';

$user = $_SESSION['user'] ?? null;
if (!$user) {
    header('Location: index.php');
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM history WHERE user_id = ? ORDER BY timestamp DESC LIMIT 50");
    $stmt->execute([$user['id']]);
    $records = $stmt->fetchAll();
} catch (PDOException $e) {
    die("ไม่สามารถดึงข้อมูลประวัติได้: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History - PromptPay QR</title>
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
    * {
      font-family: 'Prompt', sans-serif;
    }
  </style>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- **** เพิ่มส่วนนี้เข้าไป **** -->
  <script>
    tailwind.config = {
      darkMode: 'class', // เปิดใช้งาน Dark Mode แบบ Class
    }
  </script>
  <!-- ************************** -->
    <style>
    body, .bg-theme {
      transition: background-color 0.3s, color 0.3s;
    }
  </style>
  <script>
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }

    function toggleTheme() {
      document.documentElement.classList.toggle('dark');
      if (document.documentElement.classList.contains('dark')) {
        localStorage.theme = 'dark';
      } else {
        localStorage.theme = 'light';
      }
    }
  </script>
</head> 
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col items-center py-10 px-4">
    <div class="absolute top-4 right-4">
      <button onclick="toggleTheme()" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xl">
        <span class="dark:hidden">🌙</span>
        <span class="hidden dark:inline">☀️</span>
      </button>
    </div>

  <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-2xl">
    <h1 class="text-2xl font-bold mb-2 text-gray-800 dark:text-white">📜 ประวัติการสร้าง QR</h1>
    <p class="text-gray-500 dark:text-gray-400 mb-4">แสดง 50 รายการล่าสุด</p>
    
    <a href="index" class="text-blue-500 hover:underline dark:text-blue-400 text-sm">← กลับหน้าหลัก</a>
    
    <div class="mt-6 space-y-4">
      <?php if (empty($records)): ?>
        <p class="text-center text-gray-500 dark:text-gray-400 py-8">ยังไม่มีประวัติการสร้าง</p>
      <?php else: ?>
        <?php foreach ($records as $record): ?>
          <div class="border dark:border-gray-700 p-4 rounded-lg bg-gray-50 dark:bg-gray-700/50 flex justify-between items-center">
            <div>
              <p class="font-semibold text-gray-800 dark:text-gray-200">
                <?= htmlspecialchars($record['target']) ?>
              </p>
              <p class="text-sm text-gray-600 dark:text-gray-400">
                เมื่อ: <?= date("d M Y, H:i", strtotime($record['timestamp'])) ?>
              </p>
            </div>
            <div class="text-lg font-bold text-green-600 dark:text-green-400">
              <?= number_format($record['amount'], 2) ?> ฿
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>