<?php

require __DIR__ . '/../../src/Request/Request.php';

$request = new Request();

try {
    if ($request->isAjax()) {
        if ($request->get('reportKey') && $request->get('newId', 'string')) {
            $key = $request->get('reportKey');
            if ($key !== $_SESSION['_report_key_1']) {
                throw Exception("CSRF token error");
            }

            $data = file_get_contents(__DIR__ . '/../../storage/data.json', true);
            $new_id = $request->get('newId', 'string');
            if (!in_array($new_id, $data, true)) {
                $data[] = $new_id;
                file_put_contents(__DIR__ . '/../../storage/data.json', $data);

                return ['data' => null, 'message' => 'Success'];
            } else {
                throw Exception("id already exists");
            }
        }
    }
    throw Exception("Invalid request");
} catch(Exception $e) {
    return ['data' => null, 'message' => $e->getMessage()];
}

exit;