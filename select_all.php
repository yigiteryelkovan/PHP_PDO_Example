<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDO Select</title>
</head>
<body>
<?php
include( "database_config.php" );

echo '<p><h3>SELECT * FROM users</h3>';
$query = $db->query("SELECT * FROM users", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
    echo'
    <table border="1"><tr>
        <td>Username</td>
        <td>Name</td>
        <td>Surname</td>
        <td>Password</td>
        <td>E-mail</td>
        <td>Age</td>
        <td>Activity</td></tr>';
    foreach( $query as $row ){
        print '<tr><td>'.$row['username'].'</td>
               <td>'.$row['name'].'</td>
               <td>'.$row['surname'].'</td>
               <td>'.$row['password'].'</td>
               <td>'.$row['email'].'</td>
               <td>'.$row['age'].'</td>
               <td>'.$row['activity'].'</td></tr>';
    }
    echo'</tr></table>';
}



echo '<p><h3>SELECT * FROM users WHERE username = \'yigiteryelkovan\'</h3>';
$usernameparameter = 'yigiteryelkovan';
$query = $db->query("SELECT * FROM users WHERE username = '{$usernameparameter}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
    echo'
    <table border="1"><tr>
        <td>Username</td>
        <td>Name</td>
        <td>Surname</td>
        <td>Password</td>
        <td>E-mail</td>
        <td>Age</td>
        <td>Activity</td></tr>';
    foreach( $query as $row ){
        print '<tr><td>'.$row['username'].'</td>
               <td>'.$row['name'].'</td>
               <td>'.$row['surname'].'</td>
               <td>'.$row['password'].'</td>
               <td>'.$row['email'].'</td>
               <td>'.$row['age'].'</td>
               <td>'.$row['activity'].'</td></tr>';
    }
    echo'</tr></table>';
}else{
    echo 'There is no record';
}
?>
</body>
</html>