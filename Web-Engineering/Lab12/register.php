<?php
require 'session.php';
require 'db.php';
require 'csrf.php';
secureSessionStart();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyToken($_POST['csrf_token'] ?? '')) {
        die("❌ CSRF token mismatch.");
    }

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hash]);
            echo "✅ Registration successful!";
        } catch (PDOException $e) {
            echo "⚠️ Username already exists.";
        }
    } else {
        echo "⚠️ Please fill in all fields.";
    }
}
?>

<h2>Register</h2>
<form method="POST">
    Username: <input name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="hidden" name="csrf_token" value="<?php echo generateToken(); ?>">
    <button type="submit">Register</button>
</form>
<a href="login.php">Already have an account?</a>
