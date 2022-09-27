<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['_report_key_1'] = sha1(session_id()); 

require __DIR__ . '/channel/pages/main.php';
