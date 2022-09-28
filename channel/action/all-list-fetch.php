<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$result = return ['data' => null, 'message' => 'Something is wrong'];

try {
    if (isset($_POST['reportKey'])) {
        $data = file_get_contents(__DIR__ . '/../../storage/data.json', true);
        $result = ['data' => $data, 'message' => 'Success'];
    }
    throw new Exception("Invalid request");
} catch(Exception $e) {
    $result = ['data' => null, 'message' => $e->getMessage()];
}

echo json_encode($result);
