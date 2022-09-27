<?php

require __DIR__ . '/../../src/Request/Request.php';

$request = new \App\Request();

try {
    if ($request->isAjax()) {
        if ($request->get('reportKey')) {
            $key = $request->get('reportKey');
            if ($key !== $_SESSION['_report_key_1']) {
                throw new Exception("CSRF token error");
            }

            $data = file_get_contents(__DIR__ . '/../../storage/data.json', true);
            return ['data' => $data, 'message' => 'Success'];
        }
    }
    throw new Exception("Invalid request");
} catch(Exception $e) {
    return ['data' => null, 'message' => $e->getMessage()];
}

exit;