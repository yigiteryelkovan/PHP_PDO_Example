<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDO Delete</title>
</head>
<body>
<?php
include( "database_config.php" );
try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


if(isset($_POST['submit'])){ //check if form was submitted
    $deletednickname =$_POST["username"];

    echo '<p><h3>DELETE FROM users</h3>';
    $query = $db->prepare("DELETE FROM users WHERE username = :nickname");
    $delete = $query->execute(array(
        'nickname' => $deletednickname
    ));

    include( "select.php" ); //Prints Select * From
}else{
    include( "select.php" ); //Prints Select * From
    ?>
    <h3>INSERT INTO USERS</h3>
    <form name="form1" method="post" action="delete.php">
        Username: <input type="text" name="username"><br>
        <input type="submit" name="submit" value="Gönder">
    </form>
<?php } ?>
</body>
</html>