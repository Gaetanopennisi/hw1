<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "hm1";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

$tipologia = isset($_GET['tipologia']) ? mysqli_real_escape_string($conn, $_GET['tipologia']) : '';


$sql = "SELECT id, nome, descrizione, immagine, tipologia FROM panini WHERE tipologia LIKE '%$tipologia%'";
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