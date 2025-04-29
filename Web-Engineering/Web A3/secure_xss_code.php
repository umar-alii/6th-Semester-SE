$name = $_GET['name'];
echo "Hello " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8');