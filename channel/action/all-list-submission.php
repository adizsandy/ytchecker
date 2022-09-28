<?php

$result = ['data' => null, 'status' => false, 'message' => 'Something is wrong'];

try {
    if (!isset($_POST['reportKey']) || !isset($_POST['newId'])) {
        throw new Exception("Invalid request");
    }
    $data = json_decode(file_get_contents(__DIR__ . '/../../storage/data.json', true));
    $new_id = (string)$_POST['newId'];
    if (!in_array($new_id, $data, true)) {
        $data[] = $new_id;
        file_put_contents(__DIR__ . '/../../storage/data.json', $data); echo count($data);

        $result = ['data' => null, 'status' => true, 'message' => 'Success'];
    } else {
        throw new Exception("id already exists");
    }
} catch(Exception $e) {
    $result = ['data' => null, 'status' => false, 'message' => $e->getMessage()];
}

echo json_encode($result);