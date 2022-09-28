<?php

require __DIR__ . '/../../src/Request/Request.php';

$request = new Request();

$result = ['data' => null, 'status' => false, 'message' => 'Something is wrong'];

try {
    if ($request->isAjax()) {
        if ($request->get('reportKey') && $request->get('newId', 'string')) {
            // $key = $request->get('reportKey');
            // if ($key !== $_SESSION['_report_key_1']) {
            //     throw new Exception("CSRF token error");
            // }

            $data = json_decode(file_get_contents(__DIR__ . '/../../storage/data.json', true));
            $new_id = $request->get('newId', 'string');
            if (!in_array($new_id, $data, true)) {
                $data[] = $new_id;
                file_put_contents(__DIR__ . '/../../storage/data.json', $data);

                $result = ['data' => null, 'status' => true, 'message' => 'Success'];
            } else {
                throw new Exception("id already exists");
            }
        }
    }
    throw new Exception("Invalid request");
} catch(Exception $e) {
    $result = ['data' => null, 'status' => false, 'message' => $e->getMessage()];
}

echo json_encode($result);