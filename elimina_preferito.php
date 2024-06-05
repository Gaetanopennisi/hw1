<?php
require_once 'auth.php';

if (!$userid = checkAuth()) {
    error_log("Unauthorized access attempt: checkAuth failed");
    echo json_encode(array('ok' => false, 'error' => 'Unauthorized'));
    exit;
}

eliminaAlimento();

function eliminaAlimento() {
    global $userid;

    $conn = mysqli_connect("localhost", "root", "", "hm1");
    if (!$conn) {
        error_log("Database connection error: " . mysqli_connect_error());
        echo json_encode(array('ok' => false, 'error' => 'Database connection error'));
        exit;
    }
    
    $userid = mysqli_real_escape_string($conn, $userid);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Verifica se l'alimento è già stato salvato dall'utente
    $query = "SELECT * FROM preferiti WHERE id_user = '$userid' AND id = '$id'";
    $res = mysqli_query($conn, $query);
    if (!$res) {
        error_log("Query error: " . mysqli_error($conn));
        echo json_encode(array('ok' => false, 'error' => mysqli_error($conn)));
        mysqli_close($conn);
        exit;
    }

    if (mysqli_num_rows($res) == 0) {
        error_log("Alimento non trovato con id: $id");
        echo json_encode(array('ok' => false, 'message' => 'Item not found'));
        mysqli_close($conn);
        exit;
    }

    // Eliminazione dell'alimento dal database
    $query = "DELETE FROM preferiti WHERE id_user = '$userid' AND id = '$id'";
    if (mysqli_query($conn, $query)) {
        error_log("Eliminazione riuscita per l'id: $id");
        echo json_encode(array('ok' => true, 'message' => 'Deleted successfully', 'id' => $id));
    } else {
        error_log("Delete error: " . mysqli_error($conn));
        echo json_encode(array('ok' => false, 'error' => mysqli_error($conn)));
    }

    mysqli_close($conn);
    error_log("Chiusura connessione");
}
?>

