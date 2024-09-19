<?php
$host = 'localhost';
$db = 'institution_db';
$user = 'root';
$pass = '{06141122}';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO(dsn: $dsn, username: $user, password: $pass, options: $options);
} catch (\PDOException $e) {
    throw new \PDOException(message: $e->getMessage(), code: (int)$e->getCode());
}
?>