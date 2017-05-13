<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDO | Object Mapping</title>
</head>
<body>
<?php
include( "database_config.php" ); //Sets database Configuration

class Uye {

    public function adsoyad(){
        return $this->name . ' ' . $this->surname;
    }

    public function status(){
        if ( $this->activity == 1 )
            return 'Active';
        else
            return 'Deactive';
    }

}

$query = $db->query("SELECT * FROM users");
$query->setFetchMode(PDO::FETCH_CLASS, 'Uye');
if ( $query->rowCount() ) {
    echo '
    <table border="1"><tr>
        <td>Name & Surname</td>
        <td>Status</td></tr>';
    foreach ($query as $row) {

        print '<tr><td>'.$row->adsoyad().'</td>
               <td>'.$row->status().'</td></tr>';
    }
}
?>
</body>
</html>