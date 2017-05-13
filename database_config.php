<?php
$dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
$user = 'useradmin';
$password = '9R5tsKipzwgHPAbH';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>