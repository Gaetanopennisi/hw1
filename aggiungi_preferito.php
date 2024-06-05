<?php
require_once 'auth.php';

if (!$userid = checkAuth()) {
    error_log("Unauthorized access attempt: checkAuth failed");
    echo json_encode(array('ok' => false, 'error' => 'Unauthorized'));
    exit;
}

saveAlimento();

function saveAlimento() {
    global $userid;

    $conn = mysqli_connect("localhost", "root", "", "hm1");
    if (!$conn) {
        error_log("Database connection error: " . mysqli_connect_error());
        echo json_encode(array('ok' => false, 'error' => 'Database connection error'));
        exit;
    }
    
    $userid = mysqli_real_escape_string($conn, $userid);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nome_alimento = mysqli_real_escape_string($conn, $_POST['title']);
    $img = mysqli_real_escape_string($conn, $_POST['image']);
    $descrizione = mysqli_real_escape_string($conn, $_POST['descrizione']);


    // Verifica se l'alimento è già stato salvato dall'utente
    $query = "SELECT id,id_user,nome_alimento,img,descrizione FROM preferiti WHERE id_user = '$userid' AND id = '$id'";
    $res = mysqli_query($conn, $query);
    if (!$res) {
        error_log("Query error: " . mysqli_error($conn));
        echo json_encode(array('ok' => false, 'error' => mysqli_error($conn)));
        mysqli_close($conn);
        exit;
    }

    if (mysqli_num_rows($res) > 0) {
        error_log("Alimento già salvato");
        echo json_encode(array('ok' => true, 'message' => 'Already saved'));
        mysqli_close($conn);
        exit;
    }

    // Inserimento dell'alimento nel database
    $query = "INSERT INTO preferiti(id_user, id, nome_alimento, img, descrizione) VALUES('$userid','$id', '$nome_alimento', '$img', '$descrizione')";
    if (mysqli_query($conn, $query)) {
        error_log("Inserimento riuscito");
        echo json_encode(array('ok' => true, 'message' => 'Saved successfully'));
    } else {
        error_log("Insert error: " . mysqli_error($conn));
        echo json_encode(array('ok' => false, 'error' => mysqli_error($conn)));
    }

    mysqli_close($conn);
    error_log("Chiusura connessione");
}
?>