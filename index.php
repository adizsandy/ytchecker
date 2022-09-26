<?php

$data = file_get_contents(__DIR__ . '/storage/data.json', true);

require __DIR__ . '/src/controller/ytsession.php';

require __DIR__ . '/src/controller/ytaction.php';

$_SESSION['_report_key_1'] = random_bytes(16);

require __DIR__ . '/views/list.php';