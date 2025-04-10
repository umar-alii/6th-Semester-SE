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
        $required_fields = ['faculty', 'subject', 'topics', 'content_delivery_method', 
                          'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8'];
        
        foreach ($required_fields as $field) {
            if (!isset($_POST[$field])) {
                die("Error: Missing required field - $field");
            }
        }
        
        $stmt = $pdo->prepare("
    INSERT INTO feedback (
        faculty, subject, topics, content_delivery_method,
        q1, q2, q3, q4, q5, q6, q7, q8
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

        $stmt->execute([
            htmlspecialchars($_POST['faculty']),
            htmlspecialchars($_POST['subject']),
            htmlspecialchars($_POST['topics']),
            htmlspecialchars($_POST['content_delivery_method']),
            htmlspecialchars($_POST['q1']),
            htmlspecialchars($_POST['q2']),
            htmlspecialchars($_POST['q3']),
            htmlspecialchars($_POST['q4']),
            htmlspecialchars($_POST['q5']),
            htmlspecialchars($_POST['q6']),
            htmlspecialchars($_POST['q7']),
            htmlspecialchars($_POST['q8'])
        ]);

        echo "Feedback submitted successfully!<br><a href='view.php'>View Feedback</a>";
    } else {
        echo "Invalid request method.";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
