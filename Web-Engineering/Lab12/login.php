<?php
require 'session.php';
require 'db.php';
require 'csrf.php';
secureSessionStart();

// Initialize login attempt tracking
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['last_attempt_time'] = time();
}

$rate_limit = 5; // Max attempts
$lockout_time = 300; // 5 minutes

if ($_SESSION['login_attempts'] >= $rate_limit && (time() - $_SESSION['last_attempt_time']) < $lockout_time) {
    die("⛔ Too many failed login attempts. Please wait a few minutes.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyToken($_POST['csrf_token'] ?? '')) {
        die("❌ CSRF token mismatch.");
    }

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        $_SESSION['login_attempts'] = 0;
        session_regenerate_id(true); // Regenerate on successful login
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION['login_attempts']++;
        $_SESSION['last_attempt_time'] = time();
        echo "❌ Invalid credentials.";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Username: <input name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="hidden" name="csrf_token" value="<?php echo generateToken(); ?>">
    <button type="submit">Login</button>
</form>
<a href="register.php">Register</a>
