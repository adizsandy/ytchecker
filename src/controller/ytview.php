<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require '/ytaction.php';

$_SESSION['_report_key_1'] = random_bytes(16);

require __DIR__ . '/../../views/list.php';

