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

    $stmt = $pdo->query("SELECT * FROM feedback ORDER BY submitted_at DESC");
    $feedbacks = $stmt->fetchAll();

    echo "<h2>📋 All Feedback</h2>";
    echo "<table border='1' cellpadding='8'>
            <tr>
                <th>ID</th>
                <th>Faculty</th>
                <th>Subject</th>
                <th>Topics</th>
                <th>Delivery Method</th>
                <th>Q1</th><th>Q2</th><th>Q3</th><th>Q4</th>
                <th>Q5</th><th>Q6</th><th>Q7</th><th>Q8</th>
                <th>Submitted At</th>
            </tr>";

    foreach ($feedbacks as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['faculty']}</td>
                <td>{$row['subject']}</td>
                <td>{$row['topics']}</td>
                <td>{$row['content_delivery_method']}</td>
                <td>{$row['q1']}</td>
                <td>{$row['q2']}</td>
                <td>{$row['q3']}</td>
                <td>{$row['q4']}</td>
                <td>{$row['q5']}</td>
                <td>{$row['q6']}</td>
                <td>{$row['q7']}</td>
                <td>{$row['q8']}</td>
                <td>{$row['submitted_at']}</td>
              </tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
