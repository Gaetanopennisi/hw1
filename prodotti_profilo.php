<?php
require_once 'auth.php';

if (!$userid = checkAuth()) {
    error_log("Unauthorized access attempt: checkAuth failed");
    echo json_encode(array('ok' => false, 'error' => 'Unauthorized'));
    exit;
}

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "hm1";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}


$query = "SELECT id, id_user, nome_alimento, img, descrizione FROM preferiti WHERE id_user = '$userid'";
$result = mysqli_query($conn, $query);

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