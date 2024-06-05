<?php
$client_id = '3befb1ed96bf44acbc08b50567d67734';
$client_secret = 'acd7a62cf21b4eab92dbc075f2700c52';

// Funzione per ottenere il token di accesso
function getAccessToken($client_id, $client_secret) {
    $url = 'https://accounts.spotify.com/api/token';
    $headers = [
        'Authorization: Basic ' . base64_encode($client_id . ':' . $client_secret),
        'Content-Type: application/x-www-form-urlencoded'
    ];
    $body = 'grant_type=client_credentials';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        die('Errore nella richiesta CURL');
    }

    $json = json_decode($response, true);
    if (isset($json['access_token'])) {
        return $json['access_token'];
    } else {
        die('Errore nella risposta: ' . $response);
    }
}

// Ritorna il token come risposta JSON
$token = getAccessToken($client_id, $client_secret);
header('Content-Type: application/json');
echo json_encode(['access_token' => $token]);
?>