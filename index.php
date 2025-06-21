<?php
require 'config.php';
require 'db.php';

$user = $_SESSION['user'] ?? null;

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target = $_POST['target'] ?? '';
    $amount = $_POST['amount'] ?? '';

    // Save to history only if the user is logged in
    if ($user && !empty($target) && is_numeric($amount)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO history (user_id, target, amount) VALUES (?, ?, ?)");
            $stmt->execute([$user['id'], $target, $amount]);
        } catch (PDOException $e) {
            // Optional: Handle database errors, e.g., log them
        }
    }
    
    if (!empty($target) && is_numeric($amount) && $amount > 0) {
       $qrUrl = "https://www.pp-qr.com/api/image/" . urlencode($target) . "/" . urlencode($amount);
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PromptPay QR Generator</title>
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
    @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
    * {
      font-family: 'Prompt', sans-serif;
    }
  </style>
  <script>
    // Theme switcher logic
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
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col items-center justify-center p-4">
  <div class="absolute top-4 right-4">
    <button onclick="toggleTheme()" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xl">
       <span class="dark:hidden">🌙</span>
       <span class="hidden dark:inline">☀️</span>
    </button>
  </div>

  <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
    
    <div class="flex justify-between items-start mb-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">PromptPay QR</h1>
            <p class="text-gray-500 dark:text-gray-400">สร้าง QR Code สำหรับรับเงิน</p>
        </div>
        <?php if ($user): ?>
            <div class="text-right">
                <img src="https://cdn.discordapp.com/avatars/<?= htmlspecialchars($user['id']) ?>/<?= htmlspecialchars($user['avatar']) ?>.png?size=64" class="w-12 h-12 rounded-full inline-block" alt="Avatar" />
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mt-1">
                    <?= htmlspecialchars($user['username']) ?>
                </p>
            </div>
        <?php endif; ?>
    </div>

    <form method="POST" class="space-y-4">
      <div>
        <label for="target" class="block text-sm font-medium text-gray-700 dark:text-gray-300">เบอร์มือถือ / เลขบัตรประชาชน</label>
        <input type="text" id="target" name="target" placeholder="e.g. 08xxxxxxxx" required class="mt-1 border p-2 w-full rounded-md bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500">
      </div>
      <div>
        <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">จำนวนเงิน (บาท)</label>
        <input type="number" step="0.01" id="amount" name="amount" placeholder="e.g. 150.50" required class="mt-1 border p-2 w-full rounded-md bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Calculator Pad -->
      <div id="calculator" class="grid grid-cols-4 gap-2 text-lg text-gray-800 dark:text-gray-200">
          <button type="button" class="calc-btn p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">7</button>
          <button type="button" class="calc-btn p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">8</button>
          <button type="button" class="calc-btn p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">9</button>
          <button type="button" data-action="clear" class="calc-btn p-3 bg-red-500 hover:bg-red-600 text-white rounded-md">C</button>
          <button type="button" class="calc-btn p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">4</button>
          <button type="button" class="calc-btn p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">5</button>
          <button type="button" class="calc-btn p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">6</button>
          <button type="button" data-action="del" class="calc-btn p-3 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">⌫</button>
          <button type="button" class="calc-btn p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">1</button>
          <button type="button" class="calc-btn p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">2</button>
          <button type="button" class="calc-btn p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">3</button>
          <button type="button" class="row-span-2 p-3 bg-green-500 hover:bg-green-600 text-white rounded-md" onclick="document.forms[0].submit()">สร้าง</button>
          <button type="button" class="calc-btn col-span-2 p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">0</button>
          <button type="button" class="calc-btn p-3 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">.</button>
      </div>

    </form>
    
    <?php if (isset($qrUrl)): ?>
      <div class="mt-6 text-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
        <h3 class="font-bold text-lg dark:text-white mb-2">สแกนเพื่อจ่ายเงิน</h3>
        <img src="<?= $qrUrl ?>" width="220" height="220" alt="Generated PromptPay QR Code" class="mx-auto rounded-md shadow-md" />
        <p class="mt-3 text-md text-gray-800 dark:text-gray-200">
            <?= htmlspecialchars($_POST['target']) ?> — <strong><?= number_format((float)$_POST['amount'], 2) ?></strong> ฿
        </p>
      </div>
    <?php endif; ?>

    <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-4">
      <?php if (!$user): ?>
        <a href="https://discord.com/api/oauth2/authorize?client_id=<?= $_ENV['DISCORD_CLIENT_ID'] ?>&redirect_uri=<?= urlencode($_ENV['DISCORD_REDIRECT_URI']) ?>&response_type=code&scope=identify" 
           class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md">
          เข้าสู่ระบบด้วย Discord (เพื่อดูประวัติ)
        </a>
      <?php else: ?>
        <div class="flex justify-between items-center">
          <a href="history" class="text-blue-500 hover:underline dark:text-blue-400">📜 ดูประวัติการสร้าง</a>
          <a href="logout" class="text-red-500 hover:underline dark:text-red-400">ออกจากระบบ</a>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    // Calculator logic
    const amountInput = document.getElementById('amount');
    const calculator = document.getElementById('calculator');

    calculator.addEventListener('click', function(e) {
      if (e.target.matches('button.calc-btn')) {
        const button = e.target;
        const action = button.dataset.action;
        const key = button.textContent;

        if (action === 'clear') {
          amountInput.value = '';
          return;
        }
        
        if (action === 'del') {
            amountInput.value = amountInput.value.slice(0, -1);
            return;
        }

        if (!action) {
          if (key === '.' && amountInput.value.includes('.')) {
            return;
          }
          amountInput.value += key;
        }
      }
    });
  </script>

</body>
</html>