<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../../src/Request/Request.php';

$request = new \App\Request();

try {
    if (isset($_POST['reportKey'])) {
        $data = file_get_contents(__DIR__ . '/../../storage/data.json', true);print_r($data);
        return ['data' => $data, 'message' => 'Success'];
    }
    throw new Exception("Invalid request");
} catch(Exception $e) {
    return ['data' => null, 'message' => $e->getMessage()];
}
