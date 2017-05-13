<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDO | Update</title>
</head>
<body>
<?php
include( "database_config.php" ); //Sets database Configuration


if(isset($_POST['submit'])){ //check if form was submitted
    $nickname =$_POST["username"];
    $userage =$_POST["age"];
echo'<br>'.$nickname;
echo'<br>'.$userage;
    $query = $db->prepare("UPDATE users SET
    age = :newage
    WHERE username = :nickname");
    $update = $query->execute(array(
        "newage" => $userage,
        "nickname" => $nickname
    ));
    if ( $update ){
        print "Update process is succesfull!</br>".$query->rowCount()." rows affected";
    }
    include( "select.php" ); //Prints Select * From
}else{
    include( "select.php" ); //Prints Select * From
?>
    <h3>UPDATE USERS SET</h3>
    <form name="form1" method="post" action="update.php">
        Username(where parameter): <input type="text" name="username"><br>
        Age: <input type="number" name="age"><br>
        <input type="submit" name="submit" value="Gönder">
    </form>
<?php } ?>
</body>
</html>