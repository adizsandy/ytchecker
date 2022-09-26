<?php
echo "hello heroku"; exit;

$data = file_get_contents(__DIR__ . '/storage/data.json');

require __DIR__ . '/src/controller/ytchecker.php';