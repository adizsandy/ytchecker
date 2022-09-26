<?php

$data = file_get_contents(__DIR__ . '/storage/data.json', true);
print_r($data);

require __DIR__ . '/src/controller/ytchecker.php';