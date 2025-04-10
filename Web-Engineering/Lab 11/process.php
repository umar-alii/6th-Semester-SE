<?php
$host = 'localhost';
$db   = 'feedback_db';  
$user = 'root';         
$pass = '';             
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare("
            INSERT INTO feedback (
                faculty, subject, topics, delivery_method,
                q1, q2, q3, q4, q5, q6, q7, q8
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $_POST['faculty'],
            $_POST['subject'],
            $_POST['topics'],
            $_POST['delivery_method'],
            $_POST['q1'],
            $_POST['q2'],
            $_POST['q3'],
            $_POST['q4'],
            $_POST['q5'],
            $_POST['q6'],
            $_POST['q7'],
            $_POST['q8'],
        ]);

        echo "Feedback submitted successfully!<br><a href='view.php'>View Feedback</a>";
    } else {
        echo "Invalid request method.";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
