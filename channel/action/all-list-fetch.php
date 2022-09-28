<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$result = ['data' => null, 'status' => false, 'message' => 'Something is wrong'];

try {
    if (!isset($_POST['reportKey'])) {
        $result = ['data' => null, 'status' => false, 'message' => 'Error! Invalid request']; 
    }

    $data = file_get_contents(__DIR__ . '/../../storage/data.json', true);
    $result = ['data' => $data, 'status' => true, 'message' => 'Success'];

} catch(Exception $e) {
    $result = ['data' => null, 'status' => false, 'message' => $e->getMessage()];
}

echo json_encode($result);
