<?php
$host = 'localhost';
$db   = 'propelrr_exam';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    if (!preg_match("/^[A-Za-z.,\s]+$/", $_POST["fullName"]) || 
        !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || 
        !preg_match("/^09[0-9]{9}$/", $_POST["mobile"])) {
        echo "Invalid input!";
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO profiles (fullName, email, mobile, dob, age, gender) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST["fullName"], $_POST["email"], $_POST["mobile"], $_POST["dob"], $_POST["age"], $_POST["gender"]]);

    echo "Data inserted successfully!";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
