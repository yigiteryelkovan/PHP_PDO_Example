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
?>