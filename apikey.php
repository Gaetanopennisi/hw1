<?php

header('Content-Type: application/json');

$apiKey = '7fc072060ef640f6991e2b23cc15030e';

$action = $_GET['action'] ?? null;

if ($action === 'getApiKey') {
    echo json_encode(['apiKey' => $apiKey]);
    exit;
}

if ($action === 'fetchData') {
    if (!isset($_GET['query'])) {
        echo json_encode(['error' => 'Missing query parameter']);
        exit;
    }

    $query = urlencode($_GET['query']);
    $endpoint = "https://api.spoonacular.com/recipes/complexSearch?query=$query&number=10&apiKey=$apiKey";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode !== 200) {
        echo json_encode(['error' => 'Error fetching data from external API']);
        exit;
    }

    echo $response;
    exit;
}

if ($action === 'fetchRecipeInfo') {
    if (!isset($_GET['id'])) {
        echo json_encode(['error' => 'Missing ID parameter']);
        exit;
    }

    $id = urlencode($_GET['id']);
    $endpoint = "https://api.spoonacular.com/recipes/$id/information?apiKey=$apiKey";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode !== 200) {
        echo json_encode(['error' => 'Error fetching data from external API']);
        exit;
    }

    echo $response;
    exit;
}

echo json_encode(['error' => 'Invalid action']);
?>
