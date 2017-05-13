<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDO Insert</title>
</head>
<body>
<?php
include( "database_config.php" );

if(isset($_POST['submit'])){ //check if form was submitted
    $nickname =$_POST["username"];
    $userpass =$_POST["password"];
    $usermail =$_POST["email"];

    $options = ['cost' => 12];

    $userpassEncrypt = password_hash($userpass, PASSWORD_DEFAULT, $options);
    $userpassDecrypt = password_verify($userpass, $userpassEncrypt);
    echo "<b>Nickname:</b> ",$nickname,"<br>".
        "<b>UserPass:</b> ",$userpass,"<br>".
        "<b>UserPass Encrypt:</b> ",$userpassEncrypt,"<br>".
        "<b>UserPass Decrypt:</b> ",$userpassDecrypt,"<br>".
        "<b>UserMail:</b> ",$usermail,"<br>";

    echo '<p><h3>INSERT INTO users</h3>';
    $query = $db->prepare("INSERT INTO users SET
    username = :nickname,
    password = :userpass,
    email = :usermail");
    $insert = $query->execute(array(
        "nickname" => $nickname,
        "userpass" => $userpassEncrypt,
        "usermail" => $usermail,
    ));
    if ( $insert ){
        $last_id = $db->lastInsertId();
        print "insert process is succesfull!";
    }else{
        print "insert process is failed!";
    }

    include( "select.php" ); //Prints Select * From

}else{
    include( "select.php" ); //Prints Select * From
    ?>
    <h3>INSERT INTO USERS</h3>
    <form name="form1" method="post" action="insert.php">
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="password"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" name="submit" value="Gönder">
    </form>
<?php } ?>
</body>
</html>