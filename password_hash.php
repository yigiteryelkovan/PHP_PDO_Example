<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDO Password Hashing</title>
</head>
<body>
<?php echo '<p>Merhaba Dünya</p>';

// plain text password
$password = 'secretcode';

// The cost parameter can change over time as hardware improves
$options = ['cost' => 12];

$hash = password_hash($password, PASSWORD_DEFAULT, $options);
echo $hash;


if (password_verify($password, $hash)) {
    echo '<p>Password is valid!';
} else {
    echo '<p>Invalid password.';
}

?>
</body>
</html>