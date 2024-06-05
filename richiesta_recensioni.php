<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "hm1";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}



$sql = "SELECT user_id,username,rating,review FROM reviews ORDER BY rand()";
$result = mysqli_query($conn, $sql);

$data = array();
if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}


header('Content-Type: application/json');
echo json_encode($data);


mysqli_close($conn);
?>